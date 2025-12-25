<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PaymobPayment;
use App\Models\Plan;
use App\Models\Subscribtion;
use App\Services\Paymob\PaymobGateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymobController extends Controller
{
    /**
     * POST /client/plans/{plan}/pay
     * يبدأ الدفع:
     * - method=card   => يفتح iFrame
     * - method=wallet => يفتح redirect_url للمحفظة
     */
    public function pay(Request $request, Plan $plan, PaymobGateway $paymob)
    {
        $request->validate([
            'method' => ['required', 'in:card,wallet'],
            'wallet_number' => ['nullable', 'string', 'max:25'],
        ]);

        $client = auth()->guard('client')->user();

        // السعر (لو فيه discount_price استخدمه)
        $price = (int) ($plan->discount_price ?? $plan->price);

        // Paymob بيشتغل بـ "قروش" (cents)
        $amountCents = (int) ($price * 100);

        $currency = (string) config('paymob.currency', 'EGP');

        $method = (string) $request->input('method');

        // لو Wallet لازم رقم
        $walletNumber = null;
        if ($method === 'wallet') {
            $walletNumber = preg_replace('/\s+/', '', (string) $request->input('wallet_number'));
            if (!$walletNumber) {
                return back()->with('error', 'من فضلك اكتب رقم المحفظة (مثال: 01xxxxxxxxx)')->withInput();
            }
        }

        // 1) سجل عملية الدفع عندك أولاً
        $payment = PaymobPayment::create([
            'client_id' => $client->id,
            'plan_id' => $plan->id,
            'merchant_order_id' => 'SUB-' . Str::upper(Str::random(10)) . '-' . time(),
            'amount_cents' => $amountCents,
            'currency' => $currency,
            'method' => $method, // card | wallet
            'status' => 'initiated',
        ]);

        try {
            // 2) Get Auth Token
            $token = $paymob->authToken();

            // 3) Register Order on Paymob
            $paymobOrderId = $paymob->createOrder(
                $token,
                (int) $amountCents,
                (string) $currency,
                (string) $payment->merchant_order_id
            );

            $payment->update([
                'paymob_order_id' => (int) $paymobOrderId,
                'status' => 'pending',
            ]);

            // 4) Payment Key (حسب طريقة الدفع)
            $integrationId = $method === 'card'
                ? (int) config('paymob.integration_id_card')
                : (int) config('paymob.integration_id_wallet');

            // Billing data (Paymob بيطلب الحقول دي حتى لو NA)
            $billing = [
                'email' => $client->email ?? 'na@example.com',
                'first_name' => $client->first_name ?? ($client->name ?? 'Client'),
                'last_name' => $client->last_name ?? 'NA',
                'phone_number' => $client->phone ?? ($walletNumber ?: '01000000000'),
                'country' => 'EG',
                'city' => 'Cairo',
                'state' => 'Cairo',
            ];

            // ✅ الترتيب الصحيح:
            // (authToken, paymobOrderId, amountCents, currency, integrationId, billingData)
            $paymentKeyToken = $paymob->paymentKey(
                $token,
                (int) $paymobOrderId,
                (int) $amountCents,
                (string) $currency,
                (int) $integrationId,
                $billing
            );

            // 5) Redirect حسب الطريقة
            if ($method === 'card') {
                $iframeUrl = $paymob->iframeUrl($paymentKeyToken);
                return redirect()->away($iframeUrl);
            }

            // Wallet: Get redirect_url ثم redirect
            $redirectUrl = $paymob->walletPayRedirectUrl($paymentKeyToken, (string) $walletNumber);
            return redirect()->away($redirectUrl);

        } catch (\Throwable $e) {
            $payment->update([
                'status' => 'failed',
                'raw_callback' => ['error' => $e->getMessage()],
            ]);

            return back()->with('error', 'Paymob Error: ' . $e->getMessage());
        }
    }

    
    public function paymobReturn(Request $request)
{
    $data = $request->query();

    $txId            = $request->query('id');
    $paymobOrderId   = $request->query('order');
    $merchantOrderId = $request->query('merchant_order_id');

    $payment = null;

    if ($paymobOrderId) {
        $payment = PaymobPayment::where('paymob_order_id', (int)$paymobOrderId)->first();
    }

    if (!$payment && $txId) {
        $payment = PaymobPayment::where('paymob_transaction_id', (int)$txId)->first();
    }

    if (!$payment && $merchantOrderId) {
        $payment = PaymobPayment::where('merchant_order_id', (string)$merchantOrderId)->first();
    }

    // 👇 هنا بدل /client/plans
    $plansUrl = config('app.url') . '/client/plan/index';

    if (!$payment) {
        return redirect()->route("client.plan.index")->with('error', 'Payment not found (callback).');
    }

    $payment->update([
        'paymob_transaction_id' => $txId ? (int)$txId : $payment->paymob_transaction_id,
        'raw_callback' => $data,
    ]);

    $success = filter_var($request->query('success'), FILTER_VALIDATE_BOOLEAN);
    $pending = filter_var($request->query('pending'), FILTER_VALIDATE_BOOLEAN);

    if ($success && !$pending) {
        $this->markPaidAndCreateSubscription($payment);
        return redirect()->route("client.plan.index")->with('success', 'Payment successfully');
        // return redirect()->away($plansUrl)->with('success', 'Payment successfully');
    }

    $payment->update([
        'status' => $pending ? 'pending' : 'failed',
    ]);

    return redirect()->away($plansUrl)->with(
        'error',
        $pending ? 'الدفع قيد المراجعة (Pending).' : 'فشل الدفع أو تم الإلغاء.'
    );
}


    /**
     * POST /paymob/processed
     * Processed Callback (Webhook)
     */
    public function processedCallback(Request $request)
    {
        $payload = $request->all();
        $obj = $payload['obj'] ?? null;

        if (!$obj) {
            return response()->json(['ok' => false, 'msg' => 'Missing obj'], 400);
        }

        $paymobOrderId = $obj['order']['id'] ?? null;
        $txId = $obj['id'] ?? null;

        $payment = $paymobOrderId
            ? PaymobPayment::where('paymob_order_id', (int) $paymobOrderId)->first()
            : null;

        if (!$payment) {
            return response()->json(['ok' => false, 'msg' => 'Payment not found'], 404);
        }

        $payment->update([
            'paymob_transaction_id' => $txId ? (int) $txId : $payment->paymob_transaction_id,
            'raw_callback' => $payload,
        ]);

        $success = (bool) ($obj['success'] ?? false);
        $pending = (bool) ($obj['pending'] ?? false);

        if ($success && !$pending) {
            $this->markPaidAndCreateSubscription($payment);
        } else {
            $payment->update([
                'status' => $pending ? 'pending' : 'failed',
            ]);
        }

        return response()->json(['ok' => true]);
    }

    /**
     * بعد نجاح الدفع:
     * - اقفل أي اشتراك نشط قديم
     * - اعمل اشتراك جديد في جدول subscribtions
     * - حدّث payment status إلى paid
     */
    private function markPaidAndCreateSubscription(PaymobPayment $payment): void
    {
        DB::transaction(function () use ($payment) {

            // ✅ lock row to avoid double processing
            $paymentLocked = PaymobPayment::where('id', $payment->id)->lockForUpdate()->first();

            if (!$paymentLocked || $paymentLocked->status === 'paid') {
                return;
            }

            $plan = Plan::findOrFail($paymentLocked->plan_id);

            $pricePaid = (int) ($plan->discount_price ?? $plan->price);

            $start = Carbon::today();
            $end   = Carbon::today()->addWeeks((int) $plan->duration);

            // اقفل أي اشتراك نشط قديم
            Subscribtion::where('client_id', $paymentLocked->client_id)
                ->where('is_active', true)
                ->update([
                    'is_active' => false,
                    'is_cancelled' => false,
                ]);

            // اشتراك جديد
            Subscribtion::create([
                'client_id' => $paymentLocked->client_id,
                'plan_id' => $paymentLocked->plan_id,
                'start_date' => $start,
                'end_date' => $end,
                'price_paid' => $pricePaid,
                'payment_method' => $paymentLocked->method, // card | wallet
                'is_active' => true,
                'is_cancelled' => false,
            ]);

            $paymentLocked->update([
                'status' => 'paid',
            ]);
        });
    }

    // (اختياري) صفحة نتيجة
    public function result()
    {
        return view('client.pages.payment.result');
    }
}
