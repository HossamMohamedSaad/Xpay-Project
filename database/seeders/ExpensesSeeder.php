<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نجيب الحسابات متجموعة حسب client_id
        $accountsByClient = DB::table('accounts')->get()->groupBy('client_id');

        // نجيب كاتيجوريز المصروفات متجمعة حسب client_id
        $expenseCategoriesByClient = DB::table('expense_categories')->get()->groupBy('client_id');

        // لو مفيش بيانات أصلاً منفضّل منعملش insert
        if ($accountsByClient->isEmpty() || $expenseCategoriesByClient->isEmpty()) {
            return;
        }

        // هنجيب الـ clients اللي عندهم accounts و expense_categories مع بعض
        $clientIdsWithAccounts = $accountsByClient->keys()->all();
        $clientIdsWithCategories = $expenseCategoriesByClient->keys()->all();

        $validClientIds = array_values(array_intersect($clientIdsWithAccounts, $clientIdsWithCategories));

        if (empty($validClientIds)) {
            // مفيش ولا client عنده الاتنين، يبقى منعملش seed
            return;
        }

        $expenses = [];

        for ($i = 1; $i <= 100; $i++) {
            // نختار client عنده accounts و categories
            $clientId = $validClientIds[array_rand($validClientIds)];

            // نختار account و category لنفس الـ client
            $account = $accountsByClient[$clientId]->random();
            $category = $expenseCategoriesByClient[$clientId]->random();

            $amount = rand(50, 5000);

            $expenses[] = [
                'client_id'           => $clientId,
                'expense_category_id' => $category->id,
                'account_id'          => $account->id,
                'amount'              => $amount,
                'description'         => "Sample expense {$i} for client {$clientId}.",
                'created_at'          => now(),
                'updated_at'          => now(),
            ];
        }

        DB::table('expenses')->insert($expenses);
    }
}
