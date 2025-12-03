<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthlyReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // نجيب كل الـ clients
        $clients = DB::table('clients')->get();

        if ($clients->isEmpty()) {
            return;
        }

        // نجيب مصادر الدخل و نجمعها حسب client_id
        $incomeSourcesByClient = DB::table('income_sources')->get()->groupBy('client_id');

        // نجيب كاتيجوريز المصروفات و نجمعها حسب client_id
        $expenseCategoriesByClient = DB::table('expense_categories')->get()->groupBy('client_id');

        $monthlyReports = [];

        for ($i = 1; $i <= 100; $i++) {
            // نختار client عشوائي
            $client = $clients->random();
            $clientId = $client->id;

            // نختار شهر وسنة منطقية
            $month = rand(1, 12);
            $year  = (int) date('Y'); // السنة الحالية مثلاً

            // إجمالي الدخل والمصروف
            $totalIncome  = rand(2000, 30000);
            $totalExpense = rand(500, 20000);
            $netBalance   = $totalIncome - $totalExpense;

            // top income source (لو عنده مصادر دخل)
            $topIncomeSourceId = null;
            if ($incomeSourcesByClient->has($clientId) && $incomeSourcesByClient[$clientId]->isNotEmpty()) {
                $topIncomeSourceId = $incomeSourcesByClient[$clientId]->random()->id;
            }

            // top expense category (لو عنده كاتيجوريز)
            $topExpenseCategoryId = null;
            if ($expenseCategoriesByClient->has($clientId) && $expenseCategoriesByClient[$clientId]->isNotEmpty()) {
                $topExpenseCategoryId = $expenseCategoriesByClient[$clientId]->random()->id;
            }

            $monthlyReports[] = [
                'client_id'             => $clientId,
                'top_income_source_id'  => $topIncomeSourceId,
                'top_expense_category_id' => $topExpenseCategoryId,
                'month'                 => $month,
                'year'                  => $year,
                'total_income'          => $totalIncome,
                'total_expense'         => $totalExpense,
                'net_balance'           => $netBalance,
                'created_at'            => now(),
                'updated_at'            => now(),
            ];
        }

        DB::table('monthly_reports')->insert($monthlyReports);
    }
}
