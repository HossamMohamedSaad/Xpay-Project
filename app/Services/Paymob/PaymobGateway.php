<?php

namespace App\Services\Paymob;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use RuntimeException;

/**
 * Paymob Gateway (Manual / No Package)
 *
 * Flow:
 * 1) authToken()                     => POST /api/auth/tokens
 * 2) createOrder()                   => POST /api/ecommerce/orders
 * 3) paymentKey()                    => POST /api/acceptance/payment_keys
 * 4) Card: iframeUrl(paymentKey)     => GET  /api/acceptance/iframes/{IFRAME_ID}?payment_token=...
 * 5) Wallet: walletPayRedirectUrl()  => POST /api/acceptance/payments/pay  => returns redirect_url
 *
 * Important:
 * - Base URL MUST include /api, we auto-fix it in constructor.
 * - If you still get 404, try base url: https://accept.paymobsolutions.com
 */
class PaymobGateway
{
    private string $baseUrl;   // will end with .../api
    private string $apiKey;

    public function __construct()
    {
        // You may set PAYMOB_BASE_URL as:
        // - https://accept.paymob.com
        // - https://accept.paymob.com/api
        // - https://accept.paymobsolutions.com
        // This code will normalize it to end with /api
        $raw = (string) config('paymob.base_url', 'https://accept.paymob.com');
        $raw = rtrim($raw, '/');

        if (!str_ends_with($raw, '/api')) {
            $raw .= '/api';
        }

        $this->baseUrl = $raw;

        $this->apiKey = (string) config('paymob.api_key');
        if (!$this->apiKey) {
            throw new RuntimeException('PAYMOB_API_KEY is missing in .env/config.');
        }
    }

    /**
     * 1) Get Paymob Auth Token
     * POST {baseUrl}/auth/tokens
     */
    public function authToken(bool $useCache = true): string
    {
        if ($useCache) {
            // Paymob token عادة صالح فترة، نخزنه 55 دقيقة كحل عملي
            return Cache::remember('paymob_auth_token', 55 * 60, function () {
                return $this->authToken(false);
            });
        }

        $res = Http::asJson()
            ->timeout(30)
            ->post($this->baseUrl . '/auth/tokens', [
                'api_key' => $this->apiKey,
            ]);

        if (!$res->successful()) {
            throw new RuntimeException(
                "Paymob auth failed ({$res->status()}): " . $res->body()
            );
        }

        $token = $res->json('token');
        if (!$token) {
            throw new RuntimeException('Paymob auth token missing in response: ' . $res->body());
        }

        return (string) $token;
    }

    /**
     * 2) Register Order
     * POST {baseUrl}/ecommerce/orders
     */
    public function createOrder(
        string $authToken,
        int $amountCents,
        string $currency,
        string $merchantOrderId,
        array $items = []
    ): int {
        $res = Http::asJson()
            ->timeout(30)
            ->post($this->baseUrl . '/ecommerce/orders', [
                'auth_token'        => $authToken,
                'delivery_needed'   => false,
                'amount_cents'      => $amountCents,
                'currency'          => $currency,
                'merchant_order_id' => $merchantOrderId,
                'items'             => $items, // optional
            ]);

        if (!$res->successful()) {
            throw new RuntimeException(
                "Paymob create order failed ({$res->status()}): " . $res->body()
            );
        }

        $orderId = $res->json('id');
        if (!$orderId) {
            throw new RuntimeException('Paymob order id missing in response: ' . $res->body());
        }

        return (int) $orderId;
    }

    /**
     * 3) Create Payment Key
     * POST {baseUrl}/acceptance/payment_keys
     */
    public function paymentKey(
        string $authToken,
        int $paymobOrderId,
        int $amountCents,
        string $currency,
        int $integrationId,
        array $billingData,
        int $expirationSeconds = 3600
    ): string {
        if ($integrationId <= 0) {
            throw new RuntimeException('Paymob integration_id is missing or invalid.');
        }

        // Paymob requires these billing fields even if "NA"
        $billingData = array_merge([
            'apartment' => 'NA',
            'email' => 'na@example.com',
            'floor' => 'NA',
            'first_name' => 'NA',
            'street' => 'NA',
            'building' => 'NA',
            'phone_number' => '01000000000',
            'shipping_method' => 'NA',
            'postal_code' => 'NA',
            'city' => 'NA',
            'country' => 'EG',
            'last_name' => 'NA',
            'state' => 'NA',
        ], $billingData);

        $res = Http::asJson()
            ->timeout(30)
            ->post($this->baseUrl . '/acceptance/payment_keys', [
                'auth_token'     => $authToken,
                'amount_cents'   => $amountCents,
                'expiration'     => $expirationSeconds,
                'order_id'       => $paymobOrderId,
                'billing_data'   => $billingData,
                'currency'       => $currency,
                'integration_id' => $integrationId,
                'lock_order_when_paid' => false,
            ]);

        if (!$res->successful()) {
            throw new RuntimeException(
                "Paymob payment key failed ({$res->status()}): " . $res->body()
            );
        }

        $token = $res->json('token');
        if (!$token) {
            throw new RuntimeException('Paymob payment key token missing in response: ' . $res->body());
        }

        return (string) $token;
    }

    /**
     * 4) Card iFrame URL
     * GET {baseUrl}/acceptance/iframes/{IFRAME_ID}?payment_token=...
     */
    public function iframeUrl(string $paymentKeyToken): string
    {
        $iframeId = (int) config('paymob.iframe_id');
        if ($iframeId <= 0) {
            throw new RuntimeException('PAYMOB_IFRAME_ID is missing or invalid.');
        }

        return $this->baseUrl
            . "/acceptance/iframes/{$iframeId}?payment_token="
            . urlencode($paymentKeyToken);
    }

    /**
     * 5) Wallet Pay => returns redirect_url
     * POST {baseUrl}/acceptance/payments/pay
     */
    public function walletPayRedirectUrl(string $paymentKeyToken, string $walletNumber): string
    {
        $walletNumber = preg_replace('/\s+/', '', $walletNumber);

        if (!$walletNumber) {
            throw new RuntimeException('walletNumber is required for wallet payments.');
        }

        $res = Http::asJson()
            ->timeout(30)
            ->post($this->baseUrl . '/acceptance/payments/pay', [
                'source' => [
                    'identifier' => $walletNumber,
                    'subtype' => 'WALLET',
                ],
                'payment_token' => $paymentKeyToken,
            ]);

        if (!$res->successful()) {
            throw new RuntimeException(
                "Paymob wallet pay failed ({$res->status()}): " . $res->body()
            );
        }

        $redirect = $res->json('redirect_url');
        if (!$redirect) {
            throw new RuntimeException('Paymob wallet redirect_url missing in response: ' . $res->body());
        }

        return (string) $redirect;
    }

    /**
     * Useful for debugging (to know which final base URL is used)
     */
    public function getNormalizedBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
