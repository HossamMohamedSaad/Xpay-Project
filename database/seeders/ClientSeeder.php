<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $clients = [];

        for ($i = 1; $i <= 20; $i++) {
            $clients[] = [
                'name'       => "Client {$i}",
                'email'      => "client{$i}@example.com", // لازم تكون unique
                'password'   => Hash::make('11223344'), // باسورد مشفّر
                'phone'      => '010' . str_pad((string) $i, 8, '0', STR_PAD_LEFT),
                'is_active'  => $i % 5 !== 0, // نخلي كل 5th واحد inactive كـ مثال
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('clients')->insert($clients);
    }
}
