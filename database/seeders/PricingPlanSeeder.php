<?php

namespace Database\Seeders;

use App\Models\PricingPlan;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    public function run(): void
    {
        PricingPlan::updateOrCreate(
            ['plan_key' => 'basic'],
            [
                'title' => 'Basic',
                'subtitle' => '3 Month',
                'price_text' => null,
                'session_text' => null,
                'features' => [
                    'amazing yoga courses',
                    'access all courses',
                    'no regeneration fels',
                ],
                'button_text' => 'Book Now',
                'is_featured' => false,
                'sort_order' => 1,
            ]
        );

        PricingPlan::updateOrCreate(
            ['plan_key' => 'best-value'],
            [
                'title' => 'BEST VALUE',
                'subtitle' => null,
                'price_text' => 'IDR 6.000.000',
                'session_text' => null,
                'features' => [
                    'amazing yoga courses',
                    'access all courses',
                    'no regeneration fels',
                ],
                'button_text' => 'Book Now',
                'is_featured' => true,
                'sort_order' => 2,
            ]
        );

        PricingPlan::updateOrCreate(
            ['plan_key' => 'premium'],
            [
                'title' => 'Premium',
                'subtitle' => 'IDR 1.500.000',
                'price_text' => null,
                'session_text' => '16+Session',
                'features' => [
                    'amazing yoga courses',
                    'access all courses',
                    'no regeneration fels',
                ],
                'button_text' => 'Book Now',
                'is_featured' => false,
                'sort_order' => 3,
            ]
        );
    }
}
