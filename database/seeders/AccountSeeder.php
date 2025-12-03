<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
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

        $accounts = [];
        $defaultForClient = []; // عشان نضمن لكل client حساب default واحد بس

        for ($i = 1; $i <= 20; $i++) {
            // نختار client عشوائي
            $clientId = $clientIds[array_rand($clientIds)];

            $isDefault = false;

            // أول حساب لكل client نخليه default
            if (!isset($defaultForClient[$clientId])) {
                $isDefault = true;
                $defaultForClient[$clientId] = true;
            }

            $accounts[] = [
                'client_id'  => $clientId,
                'name'       => "Account {$i}",
                'amount'     => rand(0, 10000),   // مبلغ عشوائي
                'is_default' => $isDefault,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('accounts')->insert($accounts);
    }
}
