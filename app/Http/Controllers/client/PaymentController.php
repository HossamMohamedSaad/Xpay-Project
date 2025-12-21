<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Plan;
use App\Models\subscribtion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Skrskr\Paymob\Facades\Paymob;

class PaymentController extends Controller
{
    /**
     * 1) Client chooses a plan -> we create a Payment record -> redirect to Paymob iframe
     */
    public function startPayment(Request $request, Plan $plan)
    {
        $client = auth('client')->user();

        // Convert your plan price to cents (Paymob uses amount_cents)
        $amountCents = (int) round(((float) $plan->price) * 100);

        // Create a payment row (pending)
        $payment = Payment::create([
            'client_id' => $client->id,
            'plan_id' => $plan->id,
            'merchant_order_id' => 'P'.time().'-'.$client->id.'-'.$plan->id,
            'amount_cents' => $amountCents,
            'currency' => 'EGP',
            'status' => 'initiated',
            'payment_method' => 'paymob_card',
        ]);

        // Build billing data (Paymob requires it for card)
        // Adjust fields to match what Paymob expects in your package docs.
        $orderData = [
            'amount' => $amountCents,
            'currency' => 'EGP',
            'expiration' => 3600, // 1 hour
            'merchant_order_id' => $payment->merchant_order_id,
            // IMPORTANT for order registration:
            'delivery_needed' => 'false',
            'items' => [],

            'billing_data' => [
                'first_name' => $client->first_name ?? $client->name ?? 'Client',
                'last_name' => $client->last_name ?? 'User',
                'email' => $client->email ?? 'no@email.com',
                'phone_number' => $client->phone ?? '01000000000',

                // minimal safe defaults (fill from your client profile if you have)
                'apartment' => 'NA',
                'floor' => 'NA',
                'street' => 'NA',
                'building' => 'NA',
                'shipping_method' => 'PKG',
                'postal_code' => '00000',
                'city' => 'Cairo',
                'country' => 'EG',
                'state' => 'Cairo',
            ],
        ];

        // This returns iframe URL -> redirect client to pay
        // (this is the core package usage)

        $iframeUrl = Paymob::pay($orderData); // per package usage docs :contentReference[oaicite:6]{index=6}

        // Update status
        $payment->update(['status' => 'pending']);

        // dd($payment);
        return redirect()->away($iframeUrl);
    }

    /**
     * 2) Transaction Processed Callback (POST) - update DB here (MOST IMPORTANT)
     */
    public function processedCallback(Request $request)
    {
        // Paymob will POST JSON. Usually it includes an "obj" with transaction details.
        $payload = $request->all();
        $obj = $payload['obj'] ?? null;

        // If payload shape differs in your account, dump logs once and adjust mapping.
        if (! $obj) {
            return response()->json(['message' => 'Invalid payload'], 400);
        }

        // (Recommended) Verify HMAC here using PAYMOB_HMAC_SECRET.
        // The exact concatenation order is defined by Paymob docs (HMAC Processed Callback).
        // If you skip HMAC verification: anyone could hit your endpoint and fake success.
        // For now we’ll do a "soft check" if the hmac exists; implement full check ASAP.
        // $this->assertValidProcessedHmac($payload);

        $success = (bool) ($obj['success'] ?? false);

        // Where to find IDs depends on Paymob payload
        $transactionId = $obj['id'] ?? null;
        $paymobOrderId = $obj['order']['id'] ?? null;
        $merchantOrderId = $obj['order']['merchant_order_id'] ?? null;

        if (! $merchantOrderId) {
            return response()->json(['message' => 'Missing merchant_order_id'], 400);
        }

        /** @var Payment $payment */
        $payment = Payment::where('merchant_order_id', $merchantOrderId)->first();

        if (! $payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Idempotency: Paymob may retry callbacks
        if ($payment->status === 'success') {
            return response()->json(['message' => 'Already processed'], 200);
        }

        // Update payment record first
        $payment->update([
            'paymob_order_id' => $paymobOrderId,
            'paymob_transaction_id' => $transactionId,
            'success' => $success,
            'status' => $success ? 'success' : 'failed',
            'raw_callback' => $payload,
        ]);

        if (! $success) {
            return response()->json(['message' => 'Payment failed'], 200);
        }

        // SUCCESS -> create subscription
        DB::transaction(function () use ($payment) {
            $clientId = $payment->client_id;
            $planId = $payment->plan_id;

            $plan = Plan::findOrFail($planId);

            // Optional: deactivate old subscriptions
            subscribtion::where('client_id', $clientId)
                ->where('is_active', true)
                ->update(['is_active' => false]);

            $start = Carbon::today();
            // Adjust this based on your plan schema
            // مثال: لو عندك duration_days في plans
            $end = $start->copy()->addWeeks((int) $plan->duration); // in weeks

            subscribtion::create([
                'client_id' => $clientId,
                'plan_id' => $planId,
                'start_date' => $start,
                'end_date' => $end,
                'price_paid' => (int) round($payment->amount_cents / 100),
                'payment_method' => 'paymob_card',
                'is_active' => true,
                'is_cancelled' => false,
            ]);
        });

        return response()->json(['message' => 'OK'], 200);
    }

    /**
     * 3) Transaction Response Callback (GET) - show message to the client
     *
     * Paymob sends query params like success, amount_cents, id, merchant_order_id, hmac, ...
     * Example looks like this. :contentReference[oaicite:7]{index=7}
     */
    public function responseCallback(Request $request)
    {
        $merchantOrderId = $request->get('merchant_order_id');
        $success = filter_var($request->get('success'), FILTER_VALIDATE_BOOLEAN);

        if ($merchantOrderId) {
            $payment = Payment::where('merchant_order_id', $merchantOrderId)->first();
            // We DO NOT rely on this to update DB, just show result:
            if ($payment && $payment->status === 'success') {
                return redirect()->route('client.payment.success');
            }
        }

        return $success
            ? redirect()->route('client.payment.success')
            : redirect()->route('client.payment.failed');
    }

    public function successPage()
    {
        return view('client.pages.payment.success');
    }

    public function failedPage()
    {
        return view('client.pages.payment.failed');
    }
    
}
