<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [];

        for ($i = 1; $i <= 3; $i++) {
            $price = 100 * $i; // مثال: 100, 200, 300 ...

            $plans[] = [
                'name'           => "Plan {$i}",
                'price'          => $price,
                // كل خطة ثالثة ليها خصم، والباقي null
                'discount_price' => $i % 3 === 0 ? $price - 20 : null,
                'duration'       => 3* $i, // مثال: 30, 60, 90 أيام
                'description'    => "This is a sample description for Plan {$i}.",
                'is_visible'     => true,
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        DB::table('plans')->insert($plans);
    }
}
