<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TrainerSeeder::class,
            YogaClassSeeder::class,
            ScheduleSeeder::class,
            BookingSeeder::class,
        ]);
    }
}