<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\User;
use App\Models\YogaClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class ScheduleVisibilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_landing_page_hides_past_schedules_and_limits_to_four_nearest(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-05-05 12:00:00'));

        $class = YogaClass::create([
            'name' => 'Test Class',
            'price' => 100000,
            'description' => 'Test',
        ]);

        $trainer = Trainer::create([
            'name' => 'Test Trainer',
            'bio' => 'Test',
            'photo_url' => null,
        ]);

        $today = Carbon::now()->toDateString();

        $pastSchedule = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->subDay()->toDateString(),
            'start_time' => '10:00:00',
            'end_time' => '11:00:00',
            'quota' => 10,
        ]);

        $todayAlreadyStarted = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => $today,
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'quota' => 10,
        ]);

        $todayUpcoming = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => $today,
            'start_time' => '13:00:00',
            'end_time' => '14:00:00',
            'quota' => 10,
        ]);

        $tomorrowMorning = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->addDay()->toDateString(),
            'start_time' => '08:00:00',
            'end_time' => '09:00:00',
            'quota' => 10,
        ]);

        $tomorrowEvening = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->addDay()->toDateString(),
            'start_time' => '16:00:00',
            'end_time' => '17:00:00',
            'quota' => 10,
        ]);

        $day2Morning = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->addDays(2)->toDateString(),
            'start_time' => '07:00:00',
            'end_time' => '08:00:00',
            'quota' => 10,
        ]);

        $day3Morning = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->addDays(3)->toDateString(),
            'start_time' => '07:00:00',
            'end_time' => '08:00:00',
            'quota' => 10,
        ]);

        $day4Morning = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->addDays(4)->toDateString(),
            'start_time' => '07:00:00',
            'end_time' => '08:00:00',
            'quota' => 10,
        ]);

        $response = $this->get(route('landing'));

        $response->assertOk();

        /** @var \Illuminate\Support\Collection $schedules */
        $schedules = $response->viewData('schedules');

        $this->assertCount(4, $schedules);

        $this->assertFalse($schedules->contains('id', $pastSchedule->id));
        $this->assertFalse($schedules->contains('id', $todayAlreadyStarted->id));

        $this->assertTrue($schedules->contains('id', $todayUpcoming->id));
        $this->assertTrue($schedules->contains('id', $tomorrowMorning->id));
        $this->assertTrue($schedules->contains('id', $tomorrowEvening->id));
        $this->assertTrue($schedules->contains('id', $day2Morning->id));

        $this->assertFalse($schedules->contains('id', $day3Morning->id));
        $this->assertFalse($schedules->contains('id', $day4Morning->id));

        Carbon::setTestNow();
    }

    public function test_booking_page_hides_past_schedules_and_shows_all_upcoming(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-05-05 12:00:00'));

        $user = User::create([
            'name' => 'Test Member',
            'email' => 'member@test.com',
            'phone_number' => '080000000001',
            'password' => bcrypt('secret123'),
            'role' => 'member',
        ]);

        $class = YogaClass::create([
            'name' => 'Test Class',
            'price' => 100000,
            'description' => 'Test',
        ]);

        $trainer = Trainer::create([
            'name' => 'Test Trainer',
            'bio' => 'Test',
            'photo_url' => null,
        ]);

        $today = Carbon::now()->toDateString();

        $pastSchedule = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->subDay()->toDateString(),
            'start_time' => '10:00:00',
            'end_time' => '11:00:00',
            'quota' => 10,
        ]);

        $todayAlreadyStarted = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => $today,
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'quota' => 10,
        ]);

        $upcomingSchedules = collect([
            Schedule::create([
                'class_id' => $class->id,
                'trainer_id' => $trainer->id,
                'date' => $today,
                'start_time' => '13:00:00',
                'end_time' => '14:00:00',
                'quota' => 10,
            ]),
            Schedule::create([
                'class_id' => $class->id,
                'trainer_id' => $trainer->id,
                'date' => Carbon::now()->addDay()->toDateString(),
                'start_time' => '08:00:00',
                'end_time' => '09:00:00',
                'quota' => 10,
            ]),
            Schedule::create([
                'class_id' => $class->id,
                'trainer_id' => $trainer->id,
                'date' => Carbon::now()->addDay()->toDateString(),
                'start_time' => '16:00:00',
                'end_time' => '17:00:00',
                'quota' => 10,
            ]),
            Schedule::create([
                'class_id' => $class->id,
                'trainer_id' => $trainer->id,
                'date' => Carbon::now()->addDays(2)->toDateString(),
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'quota' => 10,
            ]),
            Schedule::create([
                'class_id' => $class->id,
                'trainer_id' => $trainer->id,
                'date' => Carbon::now()->addDays(3)->toDateString(),
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'quota' => 10,
            ]),
            Schedule::create([
                'class_id' => $class->id,
                'trainer_id' => $trainer->id,
                'date' => Carbon::now()->addDays(4)->toDateString(),
                'start_time' => '07:00:00',
                'end_time' => '08:00:00',
                'quota' => 10,
            ]),
        ]);

        $response = $this->actingAs($user)->get(route('member.booking.index'));

        $response->assertOk();

        /** @var \Illuminate\Support\Collection $schedules */
        $schedules = $response->viewData('schedules');

        $this->assertFalse($schedules->contains('id', $pastSchedule->id));
        $this->assertFalse($schedules->contains('id', $todayAlreadyStarted->id));

        $this->assertCount($upcomingSchedules->count(), $schedules);

        foreach ($upcomingSchedules as $upcomingSchedule) {
            $this->assertTrue($schedules->contains('id', $upcomingSchedule->id));
        }

        Carbon::setTestNow();
    }

    public function test_member_cannot_book_a_past_schedule_but_can_book_upcoming(): void
    {
        Carbon::setTestNow(Carbon::parse('2026-05-05 12:00:00'));

        $user = User::create([
            'name' => 'Test Member',
            'email' => 'member2@test.com',
            'phone_number' => '080000000002',
            'password' => bcrypt('secret123'),
            'role' => 'member',
        ]);

        $class = YogaClass::create([
            'name' => 'Test Class',
            'price' => 100000,
            'description' => 'Test',
        ]);

        $trainer = Trainer::create([
            'name' => 'Test Trainer',
            'bio' => 'Test',
            'photo_url' => null,
        ]);

        $pastSchedule = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->toDateString(),
            'start_time' => '09:00:00',
            'end_time' => '10:00:00',
            'quota' => 10,
        ]);

        $upcomingSchedule = Schedule::create([
            'class_id' => $class->id,
            'trainer_id' => $trainer->id,
            'date' => Carbon::now()->toDateString(),
            'start_time' => '13:00:00',
            'end_time' => '14:00:00',
            'quota' => 10,
        ]);

        $this->actingAs($user)
            ->from(route('member.booking.index'))
            ->post(route('member.booking.store', $pastSchedule))
            ->assertRedirect(route('member.booking.index'))
            ->assertSessionHas('error');

        $this->assertDatabaseMissing('bookings', [
            'user_id' => $user->id,
            'schedule_id' => $pastSchedule->id,
        ]);

        $this->actingAs($user)
            ->from(route('member.booking.index'))
            ->post(route('member.booking.store', $upcomingSchedule))
            ->assertRedirect(route('member.booking.history'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('bookings', [
            'user_id' => $user->id,
            'schedule_id' => $upcomingSchedule->id,
            'status' => 'active',
        ]);

        Carbon::setTestNow();
    }
}
