<?php

namespace Database\Seeders;

use App\Models\monthly_income_source;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            ClientSeeder::class,
            PlansSeeder::class,
            SubscribtionSeeder::class,
            AccountSeeder::class,
            IncomeSourceSeeder::class,
            MonthlyIncomeSourceSeeder::class,
            IncomeSeeder::class,
            ExpenseCategorySeeder::class,
            MonthlyExpenseCategorySeeder::class,
            ExpensesSeeder::class,
            MonthlyReportSeeder::class,
            TransactionSeeder::class,
            PaymentSeeder::class,

            
            


        ]);
    }
}
