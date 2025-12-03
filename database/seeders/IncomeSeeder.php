<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نجيب مصادر الدخل متجمعة حسب client_id
        $incomeSourcesByClient = DB::table('income_sources')->get()->groupBy('client_id');

        // نجيب الحسابات متجمعة حسب client_id
        $accountsByClient = DB::table('accounts')->get()->groupBy('client_id');

        // لو مفيش داتا خالص، منعملش insert
        if ($incomeSourcesByClient->isEmpty() || $accountsByClient->isEmpty()) {
            return;
        }

        // clients اللي عندهم income_sources و accounts مع بعض
        $clientIdsWithIncomeSources = $incomeSourcesByClient->keys()->all();
        $clientIdsWithAccounts      = $accountsByClient->keys()->all();

        $validClientIds = array_values(array_intersect($clientIdsWithIncomeSources, $clientIdsWithAccounts));

        if (empty($validClientIds)) {
            // مفيش عميل عنده الاتنين، يبقى منعملش seed
            return;
        }

        $incomes = [];

        for ($i = 1; $i <= 100; $i++) {
            // نختار client عنده حسابات و مصادر دخل
            $clientId = $validClientIds[array_rand($validClientIds)];

            $incomeSource = $incomeSourcesByClient[$clientId]->random();
            $account      = $accountsByClient[$clientId]->random();

            $amount = rand(500, 20000);

            $incomes[] = [
                'client_id'        => $clientId,
                'income_source_id' => $incomeSource->id,
                'account_id'       => $account->id,
                'amount'           => $amount,
                'description'      => "Sample income {$i} for client {$clientId}.",
                'created_at'       => now(),
                'updated_at'       => now(),
            ];
        }

        DB::table('incomes')->insert($incomes);
    }
}
