<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        
        Schema::create('paymob_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('plan_id')->constrained('plans')->cascadeOnDelete();

            // رقم الطلب عندك (نرسله لبايموب كـ merchant_order_id)
            $table->string('merchant_order_id')->unique();

            $table->integer('amount_cents');
            $table->string('currency', 10)->default('EGP');

            // من Paymob
            $table->unsignedBigInteger('paymob_order_id')->nullable()->index();
            $table->unsignedBigInteger('paymob_transaction_id')->nullable()->index();

            // card | wallet
            $table->string('method', 20);

            // initiated | pending | paid | failed | canceled
            $table->string('status', 20)->default('initiated');

            $table->json('raw_callback')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paymob_payments');
    }
};
