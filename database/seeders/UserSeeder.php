<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $defaultPassword = Hash::make('password123');
        $verifiedAt = now();

        // Akun Admin
        User::updateOrCreate([
            'email' => 'nfscheatgaming@gmail.com',
        ], [
            'name' => 'Admin Flex Yoga',
            'phone_number' => '081111111111',
            'password' => $defaultPassword,
            'role' => 'admin',
            'email_verified_at' => $verifiedAt,
        ]);

        // Member contoh untuk booking
        $users = [
            [
                'email' => 'budi@flexyoga.com',
                'name' => 'Budi Santoso',
                'phone_number' => '082222222222',
                'role' => 'member',
            ],
            [
                'email' => 'siti@flexyoga.com',
                'name' => 'Siti Aminah',
                'phone_number' => '083333333333',
                'role' => 'member',
            ],

            // Additional seeded members
            [
                'email' => 'andi@flexyoga.com',
                'name' => 'Andi Pratama',
                'phone_number' => '084444444444',
                'role' => 'member',
            ],
            [
                'email' => 'rina@flexyoga.com',
                'name' => 'Rina Putri',
                'phone_number' => '085555555555',
                'role' => 'member',
            ],
            [
                'email' => 'fajar@flexyoga.com',
                'name' => 'Fajar Nugroho',
                'phone_number' => '086666666666',
                'role' => 'member',
            ],
            [
                'email' => 'dewi@flexyoga.com',
                'name' => 'Dewi Lestari',
                'phone_number' => '087777777777',
                'role' => 'member',
            ],
            [
                'email' => 'rizky@flexyoga.com',
                'name' => 'Rizky Ramadhan',
                'phone_number' => '088888888888',
                'role' => 'member',
            ],
            [
                'email' => 'maya@flexyoga.com',
                'name' => 'Maya Sari',
                'phone_number' => '089999999999',
                'role' => 'member',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'phone_number' => $user['phone_number'],
                    'password' => $defaultPassword,
                    'role' => $user['role'],
                    'email_verified_at' => $verifiedAt,
                ]
            );
        }
    }
}