<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('plan_id')->constrained('plans')->cascadeOnDelete();

            // Your internal reference (you control it)
            $table->string('merchant_order_id')->nullable()->unique();

            // Paymob references
            $table->unsignedBigInteger('paymob_order_id')->nullable()->index();
            $table->unsignedBigInteger('paymob_transaction_id')->nullable()->index();

            $table->integer('amount_cents');
            $table->string('currency', 10)->default('EGP');

            // initiated | pending | success | failed
            $table->string('status')->default('initiated');
            $table->boolean('success')->default(false);

            $table->string('payment_method')->nullable(); // e.g. paymob_card
            $table->json('raw_callback')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
