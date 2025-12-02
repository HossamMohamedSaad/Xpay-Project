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
        Schema::create('monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('top_income_source_id')->nullable()->references('id')->on('income_sources')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('top_expense_category_id')->nullable()->references('id')->on('expense_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('month');
            $table->integer('year');
            $table->integer('total_income')->default(0);
            $table->integer('total_expense')->default(0);
            $table->integer('net_balance')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_reports');
    }
};
