<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'owner',
            ],
            [
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'kasir',
            ],
        ]);
    }
}
