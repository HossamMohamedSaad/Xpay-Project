<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // نجيب كل الحسابات و نجمعهم حسب client_id
        $accountsByClient = DB::table('accounts')->get()->groupBy('client_id');

        if ($accountsByClient->isEmpty()) {
            return;
        }

        // نختار بس العملاء اللي عندهم على الأقل 2 حساب
        $validClientIds = [];

        foreach ($accountsByClient as $clientId => $accounts) {
            if ($accounts->count() >= 2) {
                $validClientIds[] = $clientId;
            }
        }

        if (empty($validClientIds)) {
            // مفيش ولا عميل عنده حسابين، يبقى منعملش معاملات
            return;
        }

        $transactions = [];

        for ($i = 1; $i <= 20; $i++) {
            // نختار client عنده 2 حساب أو أكتر
            $clientId = $validClientIds[array_rand($validClientIds)];
            $clientAccounts = $accountsByClient[$clientId]->values();

            // نختار from/to مختلفين
            $from = $clientAccounts->random();
            do {
                $to = $clientAccounts->random();
            } while ($to->id === $from->id);

            $amount = rand(100, 10000);

            $transactions[] = [
                'client_id'         => $clientId,
                'from_account'      => $from->id,
                'to_account'        => $to->id,
                'amount'            => $amount,
                'short_description' => "Transfer {$i}",
                'description'       => "Sample transfer {$amount} from account {$from->id} to {$to->id} for client {$clientId}.",
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }

        DB::table('transactions')->insert($transactions);
    }
}
