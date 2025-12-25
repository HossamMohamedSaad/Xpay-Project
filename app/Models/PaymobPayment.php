<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymobPayment extends Model
{
   protected $fillable = [
        'client_id','plan_id','merchant_order_id',
        'amount_cents','currency',
        'paymob_order_id','paymob_transaction_id',
        'method','status','raw_callback',
    ];

    protected $casts = [
    'amount_cents' => 'integer',
    'paymob_order_id' => 'integer',
    'paymob_transaction_id' => 'integer',
    'raw_callback' => 'array',
];
}
