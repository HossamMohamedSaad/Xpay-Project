<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class MonthlyIncomeSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نجيب income_sources متجموعة حسب client_id
        $incomeSourcesByClient = DB::table('income_sources')->get()->groupBy('client_id');

        // لو مفيش مصادر دخل أصلاً نخرج
        if ($incomeSourcesByClient->isEmpty()) {
            return;
        }

        // client_ids اللي فعلاً عندهم income_sources
        $clientIdsWithSources = $incomeSourcesByClient->keys()->all();

        $monthlyIncomeSources = [];

        for ($i = 1; $i <= 20; $i++) {
            // نختار client عنده income_sources
            $clientId = $clientIdsWithSources[array_rand($clientIdsWithSources)];

            // نختار income_source يتبع نفس الـ client
            $incomeSource = $incomeSourcesByClient[$clientId]->random();

            $monthlyIncomeSources[] = [
                'client_id'        => $clientId,
                'income_source_id' => $incomeSource->id,
                'amount'           => rand(500, 10000), // مبلغ شهري عشوائي
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }

        DB::table('monthly_income_sources')->insert($monthlyIncomeSources);
    }
}
