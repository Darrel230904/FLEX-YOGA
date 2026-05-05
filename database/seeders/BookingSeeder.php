<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $budi = User::where('email', 'budi@flexyoga.com')->first();
        $siti = User::where('email', 'siti@flexyoga.com')->first();

        if (!$budi || !$siti) {
            return;
        }

        $hathaSchedule = Schedule::with('yogaClass')
            ->whereHas('yogaClass', function ($query) {
                $query->where('name', 'Hatha Yoga');
            })
            ->orderBy('date')
            ->orderBy('start_time')
            ->first();

        if (!$hathaSchedule) {
            return;
        }

        Booking::updateOrCreate(
            [
                'user_id' => $budi->id,
                'schedule_id' => $hathaSchedule->id,
            ],
            [
                'status' => 'active',
                'booking_date' => Carbon::now(),
            ]
        );

        Booking::updateOrCreate(
            [
                'user_id' => $siti->id,
                'schedule_id' => $hathaSchedule->id,
            ],
            [
                'status' => 'active',
                'booking_date' => Carbon::now(),
            ]
        );
    }
}