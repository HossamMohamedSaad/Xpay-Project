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
        Schema::create('statistic_incomes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('income_source_id')->constrained('income_sources')->cascadeOnDelete();

            $table->unsignedTinyInteger('month');
            $table->unsignedSmallInteger('year');

            $table->bigInteger('total_income')->default(0);

            $table->timestamps();

            $table->unique(['client_id', 'income_source_id', 'month', 'year'], 'income_stats_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistic_incomes');
    }
};
