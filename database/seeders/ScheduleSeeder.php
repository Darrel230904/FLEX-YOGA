<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\YogaClass;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $classIds = YogaClass::query()->pluck('id')->values();
        $trainerIds = Trainer::query()->pluck('id')->values();

        if ($classIds->isEmpty() || $trainerIds->isEmpty()) {
            return;
        }

        $templates = [
            ['dayOffset' => 1, 'start_time' => '07:00:00', 'end_time' => '08:30:00', 'quota' => 10],
            ['dayOffset' => 2, 'start_time' => '16:00:00', 'end_time' => '17:30:00', 'quota' => 15],
            ['dayOffset' => 3, 'start_time' => '09:00:00', 'end_time' => '10:00:00', 'quota' => 12],
            ['dayOffset' => 3, 'start_time' => '18:30:00', 'end_time' => '19:45:00', 'quota' => 14],
            ['dayOffset' => 4, 'start_time' => '07:30:00', 'end_time' => '09:00:00', 'quota' => 16],
            ['dayOffset' => 5, 'start_time' => '12:00:00', 'end_time' => '13:00:00', 'quota' => 10],
            ['dayOffset' => 6, 'start_time' => '19:00:00', 'end_time' => '20:15:00', 'quota' => 18],
            ['dayOffset' => 7, 'start_time' => '08:00:00', 'end_time' => '09:15:00', 'quota' => 10],
        ];

        foreach ($templates as $index => $template) {
            $classId = $classIds[$index % $classIds->count()];
            $trainerId = $trainerIds[$index % $trainerIds->count()];
            $date = Carbon::now()->addDays($template['dayOffset'])->toDateString();

            Schedule::updateOrCreate(
                [
                    'class_id' => $classId,
                    'trainer_id' => $trainerId,
                    'date' => $date,
                    'start_time' => $template['start_time'],
                ],
                [
                    'end_time' => $template['end_time'],
                    'quota' => $template['quota'],
                ]
            );
        }
    }
}