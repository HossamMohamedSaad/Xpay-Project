<?php

return [

    // 'base_url' => env('PAYMOB_API_BASE', 'https://accept.paymob.com/api'),

    'api_key'  => env('PAYMOB_API_KEY'),
    'hmac'     => env('PAYMOB_HMAC'),

    'currency' => env('PAYMOB_CURRENCY', 'EGP'),

    'integration_id_card'   => (int) env('PAYMOB_INTEGRATION_ID_CARD'),
    'integration_id_wallet' => (int) env('PAYMOB_INTEGRATION_ID_WALLET'),

    'iframe_id' => (int) env('PAYMOB_IFRAME_ID'),

    // بنستخدمه بدل APP_URL لأن في اللوكال لازم public url
    'callback_base_url' => rtrim(env('PAYMOB_CALLBACK_BASE_URL', env('APP_URL')), '/'),

    // Routes (هنركبهم تحت)
    'return_path'    => '/paymob/return',
    'processed_path' => '/paymob/processed',
    'base_url' => env('PAYMOB_BASE_URL', 'https://accept.paymob.com/api'),


];
