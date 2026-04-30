<?php

namespace Database\Seeders;

use App\Models\YogaClass;
use Illuminate\Database\Seeder;

class YogaClassSeeder extends Seeder
{
    public function run(): void
    {
        YogaClass::create([
            'name' => 'Hatha Yoga',
            'price' => 75000,
            'description' => 'Kelas dasar yang lambat dan fokus pada postur serta pernapasan. Sangat cocok untuk pemula.'
        ]);

        YogaClass::create([
            'name' => 'Vinyasa Flow',
            'price' => 100000,
            'description' => 'Kelas dinamis dengan pergerakan yang tersinkronisasi dengan napas.'
        ]);

        YogaClass::create([
            'name' => 'Power Yoga',
            'price' => 120000,
            'description' => 'Latihan intensitas tinggi untuk membangun kekuatan otot dan kardio.'
        ]);

        YogaClass::create([
            'name' => 'Yin Yoga',
            'price' => 80000,
            'description' => 'Kelas yang lambat dengan fokus pada peregangan dan relaksasi otot.'
        ]);

        YogaClass::create([
            'name' => 'Ashtanga Yoga',
            'price' => 110000,
            'description' => 'Kelas yang mengikuti serangkaian postur yang tetap dengan fokus pada kekuatan dan fleksibilitas.'
        ]);

            YogaClass::create([
                'name' => 'Restorative Yoga',
                'price' => 90000,
                'description' => 'Kelas yang menenangkan dengan penggunaan alat bantu untuk mendukung tubuh dalam postur yang nyaman.'
            ]);
    }
}