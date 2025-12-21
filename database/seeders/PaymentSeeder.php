<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\Plan;
use App\Models\Payment;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Ensure we have clients & plans to reference
        if (Client::count() === 0) {
            // If you have factories, you can replace with Client::factory()->count(10)->create();
            client::insert(collect(range(1, 10))->map(fn () => [
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray());
        }

        if (plan::count() === 0) {
            // If you have factories, you can replace with Plan::factory()->count(5)->create();
            plan::insert(collect(range(1, 5))->map(fn () => [
                'created_at' => now(),
                'updated_at' => now(),
            ])->toArray());
        }

        $clientIds = Client::query()->inRandomOrder()->limit(20)->pluck('id')->values();
        $planIds   = Plan::query()->inRandomOrder()->limit(20)->pluck('id')->values();

        $statuses = ['initiated', 'pending', 'success', 'failed'];
        $methods  = [null, 'paymob_card', 'paymob_wallet'];

        for ($i = 0; $i < 20; $i++) {
            $status  = $statuses[array_rand($statuses)];
            $success = $status === 'success';

            payment::create([
                'client_id' => $clientIds[$i % $clientIds->count()],
                'plan_id'   => $planIds[$i % $planIds->count()],

                // must be unique
                'merchant_order_id' => 'MO-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(8)) . '-' . $i,

                // nullable but indexed
                'paymob_order_id'       => rand(0, 1) ? random_int(10000000, 99999999) : null,
                'paymob_transaction_id' => rand(0, 1) ? random_int(10000000, 99999999) : null,

                'amount_cents' => random_int(5000, 500000), // 50 EGP .. 5000 EGP
                'currency'     => 'EGP',

                'status'  => $status,
                'success' => $success,

                'payment_method' => $methods[array_rand($methods)],

                // json column
                'raw_callback' => rand(0, 1) ? [
                    'source' => 'seed',
                    'note' => 'fake callback payload',
                    'status' => $status,
                    'success' => $success,
                    'created_at' => now()->toIso8601String(),
                ] : null,
            ]);
        }
    }
}
