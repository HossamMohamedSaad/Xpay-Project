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
        Schema::create('subscribtions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('plan_id')->references('id')->on('plans')->onDelete('cascade')->onUpdate('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('price_paid')->nullable();
            $table->string('payment_method')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_cancelled')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribtions');
    }
};
