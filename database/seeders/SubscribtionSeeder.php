<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SubscribtionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
       public function run(): void
    {
        // هجيب كل الكلاينتس و البلانز عشان أضمن إن الـ IDs موجودة
        $clientIds = DB::table('clients')->pluck('id')->all();
        $plans     = DB::table('plans')->get();

        if (empty($clientIds) || $plans->isEmpty()) {
            // لو مفيش داتا، نخرج عشان منعملش علاقات مكسورة
            return;
        }

        $paymentMethods = ['cash', 'credit_card', 'visa', 'paypal', 'bank_transfer'];

        $subscribtions = [];

        for ($i = 1; $i <= 20; $i++) {
            // اختار client و plan عشوائيين من الموجودين
            $clientId = $clientIds[array_rand($clientIds)];
            $plan     = $plans->random();

            // نحدد تواريخ منطقية
            $startDate = Carbon::now()->subDays(rand(0, 60))->startOfDay();
            $endDate   = (clone $startDate)->addDays(30);

            // نحسب السعر المدفوع بناءً على البلان
            $basePrice   = $plan->discount_price ?? $plan->price;
            $pricePaid   = $basePrice - rand(0, 20); // خصم بسيط عشوائي (ممكن يبقى نفس السعر)

            // نخلي بعض الاشتراكات منتهية أو متكنسلة كـ مثال
            $isActive    = $endDate->isFuture() && rand(0, 100) > 20; // 80% active لو لسه ما انتهتش
            $isCancelled = !$isActive && rand(0, 1) === 1;

            $subscribtions[] = [
                'client_id'       => $clientId,
                'plan_id'         => $plan->id,
                'start_date'      => $startDate->toDateString(),
                'end_date'        => $endDate->toDateString(),
                'price_paid'      => $pricePaid,
                'payment_method'  => $paymentMethods[array_rand($paymentMethods)],
                'is_active'       => $isActive,
                'is_cancelled'    => $isCancelled,
                'created_at'      => now(),
                'updated_at'      => now(),
            ];
        }

        DB::table('subscribtions')->insert($subscribtions);
    }
}
