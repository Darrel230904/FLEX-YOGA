<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    public function run(): void
    {
        Trainer::updateOrCreate(
            ['name' => 'Anya Geraldine'],
            [
                'bio' => 'Instruktur bersertifikat internasional dengan pengalaman 5 tahun di Vinyasa Flow.',
                'photo_url' => 'images/instructor-1.jpeg',
            ]
        );

        Trainer::updateOrCreate(
            ['name' => 'Zia'],
            [
                'bio' => 'Spesialis Hatha Yoga untuk pemula dan pemulihan cedera.',
                'photo_url' => 'images/instructor-2.jpeg',
            ]
        );


        Trainer::updateOrCreate(
            ['name' => 'Nadine Chandra'],
            [
                'bio' => 'Instruktur Yin Yoga dengan fokus pada relaksasi dan fleksibilitas.',
                'photo_url' => 'images/instructor-3.jpeg',
            ]
        );

        Trainer::updateOrCreate(
            ['name' => 'Rizky Febian'],
            [
                'bio' => 'Ahli Ashtanga Yoga dengan pendekatan dinamis dan energik.',
                'photo_url' => 'images/instructor-4.jpeg',
            ]
        );
    }
}