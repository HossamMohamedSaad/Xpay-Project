<?php

namespace App\Console\Commands;

use App\Models\income;
use App\Models\statistic_income;
use Illuminate\Console\Command;

class statisticIncome extends Command
{
    
    

    
    protected $signature = 'statistic:income {--month=} {--year=}';
    protected $description = 'make statistic income for each client per income source';

    public function handle()
    {
        // الافتراضي: الشهر اللي خلص
        $target = now()->startOfMonth()->subDay();

        $month = (int) ($this->option('month') ?: $target->month);
        $year  = (int) ($this->option('year')  ?: $target->year);

        // تجميع مرة واحدة (سريع جدًا)
        $rows = DB::table('incomes')
            ->join('income_sources', 'incomes.income_source_id', '=', 'income_sources.id')
            ->whereMonth('incomes.created_at', $month)   // لو عندك عمود date استخدمه بدل created_at
            ->whereYear('incomes.created_at', $year)
            ->groupBy('income_sources.client_id', 'incomes.income_source_id')
            ->selectRaw('income_sources.client_id as client_id, incomes.income_source_id as income_source_id, SUM(incomes.amount) as total_income')
            ->get();

        foreach ($rows as $r) {
            statistic_income::updateOrCreate(
                [
                    'client_id' => $r->client_id,
                    'income_source_id' => $r->income_source_id,
                    'month' => $month,
                    'year' => $year,
                ],
                [
                    'total_income' => (int) $r->total_income,
                ]
            );
        }

        $this->info("Income statistics updated: {$year}-{$month}");
        return self::SUCCESS;
    }
}