<?php

namespace App\Http\Controllers;

use App\Models\PricingPlan;
use App\Models\Schedule;
use App\Models\Trainer;
use App\Models\YogaClass;

class LandingPageController extends Controller
{
    public function index()
    {
        $today = now()->toDateString();
        $nowTime = now()->toTimeString();

        return view('landing', [
            'schedules' => Schedule::with(['yogaClass', 'trainer'])
                ->withCount('bookings')
                ->where(function ($query) use ($today, $nowTime) {
                    $query->where('date', '>', $today)
                        ->orWhere(function ($subQuery) use ($today, $nowTime) {
                            $subQuery->where('date', $today)
                                ->where('start_time', '>=', $nowTime);
                        });
                })
                ->orderBy('date')
                ->orderBy('start_time')
                ->take(4)
                ->get(), // [cite: 14]
            'trainers' => Trainer::all(), // [cite: 15]
            'classes' => YogaClass::all(), // [cite: 16]
            'pricingPlans' => PricingPlan::orderBy('sort_order')->get(),
        ]);
    }
}