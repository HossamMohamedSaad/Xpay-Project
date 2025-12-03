<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // نجيب IDs بتوع الـ clients عشان نضمن العلاقات صح
        $clientIds = DB::table('clients')->pluck('id')->all();

        if (empty($clientIds)) {
            // لو مفيش clients منعملش insert عشان منكسرش الـ FK
            return;
        }

        $baseCategories = [
            'Food & Groceries',
            'Rent',
            'Utilities',
            'Transportation',
            'Entertainment',
            'Healthcare',
            'Education',
            'Shopping',
            'Subscriptions',
            'Other',
        ];

        $categories = [];

        for ($i = 1; $i <= 100; $i++) {
            $clientId = $clientIds[array_rand($clientIds)];

            $name = $baseCategories[($i - 1) % count($baseCategories)] . " #{$i}";

            $categories[] = [
                'client_id'   => $clientId,
                'name'        => $name,
                'description' => "Sample expense category {$i} for client ID {$clientId}.",
                'created_at'  => now(),
                'updated_at'  => now(),
            ];
        }

        DB::table('expense_categories')->insert($categories);
    }
}
