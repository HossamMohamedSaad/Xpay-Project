<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Option 1: 20 fixed users
        $users = [];

        for ($i = 1; $i <= 20; $i++) {
            $users[] = [
                'name'              => 'Test User ' . $i,
                'email'             => 'user' . $i . '@example.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('11223344'), // default password
                'remember_token'    => null,
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }

        User::insert($users);

        
    }
}
