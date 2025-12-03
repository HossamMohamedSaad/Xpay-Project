<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthlyExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // نجيب الـ expense_categories و نجمعهم حسب الـ client_id
        $expenseCategoriesByClient = DB::table('expense_categories')->get()->groupBy('client_id');

        // لو مفيش كاتيجوريز أصلاً نخرج
        if ($expenseCategoriesByClient->isEmpty()) {
            return;
        }

        // العملاء اللي عندهم expense_categories
        $clientIdsWithCategories = $expenseCategoriesByClient->keys()->all();

        $monthlyExpenseCategories = [];

        for ($i = 1; $i <= 20; $i++) {
            // نختار client عنده كاتيجوريز
            $clientId = $clientIdsWithCategories[array_rand($clientIdsWithCategories)];

            // نختار كاتيجوري تابعة لنفس الـ client
            $expenseCategory = $expenseCategoriesByClient[$clientId]->random();

            $monthlyExpenseCategories[] = [
                'client_id'           => $clientId,
                'expense_category_id' => $expenseCategory->id,
                'amount'              => rand(200, 8000), // مبلغ شهري عشوائي
                'created_at'          => now(),
                'updated_at'          => now(),
            ];
        }

        DB::table('monthly_expense_categories')->insert($monthlyExpenseCategories);
    }
}
