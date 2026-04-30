<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Admin
        User::firstOrCreate([
            'email' => 'nfscheatgaming@gmail.com',
        ], [
            'name' => 'Admin Flex Yoga',
            'phone_number' => '081111111111',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Member contoh untuk booking
        User::firstOrCreate([
            'email' => 'budi@flexyoga.com',
        ], [
            'name' => 'Budi Santoso',
            'phone_number' => '082222222222',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

        User::firstOrCreate([
            'email' => 'siti@flexyoga.com',
        ], [
            'name' => 'Siti Aminah',
            'phone_number' => '083333333333',
            'password' => Hash::make('password123'),
            'role' => 'member',
        ]);

    }
}