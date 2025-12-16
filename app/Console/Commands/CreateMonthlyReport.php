<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Models\expense_category;
use App\Models\expenses;
use App\Models\income;
use App\Models\income_source;
use App\Models\monthly_report;
use Illuminate\Console\Command;

class CreateMonthlyReport extends Command
{
    protected $signature = 'reports:monthly {--month=} {--year=}';

    protected $description = 'Create monthly report rows for every client (if not exists)';

    public function topIncomeSource($client_id, $month, $year)
    {
        $topIncomeSourceId = null;
        $maxIncome = 0;

        $income_sources = income_source::where('client_id', $client_id)->get();
        if($income_sources == null ) 
        {
            return null;
        }
        foreach ($income_sources as $income_source) {
            $income = income::where('income_source_id', $income_source->id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('amount');

            if ($income >= $maxIncome) {
                $maxIncome = $income;
                $topIncomeSourceId = $income_source->id;
            }
        }
         return $topIncomeSourceId; 
    }


    public function topExpenseCategory($client_id, $month, $year)
    {
        $topExpenseCategoryId = null;
        $maxExpense = 0;

        $expense_cats = expense_category::where('client_id', $client_id)->get();
        if($expense_cats == null ) 
        {
            return null;
        }
        foreach ($expense_cats as $expense_cat) {
            $expense = expenses::where('expense_category_id', $expense_cat->id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('amount');

            if ($expense >= $maxExpense) {
                $maxExpense = $expense;
                $topExpenseCategoryId = $expense_cat->id;
            }
        }
         return $topExpenseCategoryId; 
    }
    public function totalIncome($client_id, $month, $year)
    {
        $totalIncome = 0;
        $income_sources = income_source::where('client_id', $client_id)->get();
        if($income_sources == null ) 
        {
            return 0;
        }
        foreach ($income_sources as $income_source) {
            $totalIncome += income::where('income_source_id', $income_source->id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('amount');
        }
         return $totalIncome;
    }
    public function totalExpense($client_id, $month, $year)
    {
        $totalExpense = 0;
        $expense_cats = expense_category::where('client_id', $client_id)->get();
        if($expense_cats == null ) 
        {
            return 0;
        }
        foreach ($expense_cats as $expense_cat) {
            $totalExpense += expenses::where('expense_category_id', $expense_cat->id)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->sum('amount');
        }
         return $totalExpense;
    }

    public function handle()
    {

        $month = (int) ($this->option('month') ?: now()->month);
        $year = (int) ($this->option('year') ?: now()->year);
        Client::select('id')->chunkById(10000, function ($clients) use ($month, $year) {
            foreach ($clients as $client) {

                monthly_report::firstOrCreate(
                    ['client_id' => $client->id, 'month' => $month, 'year' => $year],
                    [
                        'top_income_source_id' => $this->topIncomeSource($client->id, $month, $year),
                        'top_expense_category_id' => $this->topExpenseCategory($client->id, $month, $year),
                        'total_income' => $this->totalIncome($client->id, $month, $year),
                        'total_expense' => $this->totalExpense($client->id, $month, $year),
                        'net_balance' => $this->totalIncome($client->id, $month, $year) - $this->totalExpense($client->id, $month, $year),
                    ]
                );
            }
        });

        $this->info("Monthly reports ensured for all clients: {$year}-{$month}");

        return self::SUCCESS;
    }
}
