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
        $budi = User::where('email', 'budi@flexyoga.com')->firstOrFail();
        $siti = User::where('email', 'siti@flexyoga.com')->firstOrFail();
        $hathaSchedule = Schedule::where('class_id', 1)->firstOrFail();

        // Member 1 (Budi) mem-booking jadwal pertama (Hatha Yoga)
        Booking::create([
            'user_id' => $budi->id,
            'schedule_id' => $hathaSchedule->id,
            'status' => 'active',
            'booking_date' => Carbon::now(),
        ]);

        // Member 2 (Siti) mem-booking jadwal pertama (Hatha Yoga)
        Booking::create([
            'user_id' => $siti->id,
            'schedule_id' => $hathaSchedule->id,
            'status' => 'active',
            'booking_date' => Carbon::now(),
        ]);
    }
}