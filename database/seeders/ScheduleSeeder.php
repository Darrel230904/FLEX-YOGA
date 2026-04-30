<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // Jadwal untuk Hatha Yoga besok pagi (Kuota 10)
        Schedule::create([
            'class_id' => 1,
            'trainer_id' => 2,
            'date' => Carbon::tomorrow()->format('Y-m-d'),
            'start_time' => '07:00:00',
            'end_time' => '08:30:00',
            'quota' => 10,
        ]);

        // Jadwal untuk Vinyasa Flow lusa sore (Kuota 15)
        Schedule::create([
            'class_id' => 2,
            'trainer_id' => 1,
            'date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'start_time' => '16:00:00',
            'end_time' => '17:30:00',
            'quota' => 15,
        ]);
    }
}