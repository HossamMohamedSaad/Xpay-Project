<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncomeSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نجيب IDs بتاعة الكلاينتس عشان نضمن إن فيه علاقات صحيحة
        $clientIds = DB::table('clients')->pluck('id')->all();

        if (empty($clientIds)) {
            // لو مفيش clients، منعملش insert عشان منعملش علاقات مكسورة
            return;
        }

        $incomeNames = [
            'Main Salary',
            'Freelance Projects',
            'Part-time Job',
            'Online Store',
            'Investments',
            'Consulting',
            'Commission',
            'Bonus',
            'Side Hustle',
            'Rental Income',
        ];

        $incomeSources = [];

        for ($i = 1; $i <= 100; $i++) {
            $clientId = $clientIds[array_rand($clientIds)];

            $name = $incomeNames[($i - 1) % count($incomeNames)] . " #{$i}";

            $incomeSources[] = [
                'client_id'   => $clientId,
                'name'        => $name,
                'description' => "Sample income source {$i} for client ID {$clientId}.",
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        DB::table('income_sources')->insert($incomeSources);
    }
}
