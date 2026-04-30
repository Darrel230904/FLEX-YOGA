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
        return view('landing', [
            'schedules' => Schedule::with(['yogaClass', 'trainer'])->withCount('bookings')->where('date', '>=', now())->get(), // [cite: 14]
            'trainers' => Trainer::all(), // [cite: 15]
            'classes' => YogaClass::all(), // [cite: 16]
            'pricingPlans' => PricingPlan::orderBy('sort_order')->get(),
        ]);
    }
}