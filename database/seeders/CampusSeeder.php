<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campuses = [
            ['name' => 'Accra (Main Campus)', 'location' => 'Independence Avenue, Makola, Accra', 'description' => 'The main campus and seat of the Ghana School of Law.'],
            ['name' => 'Kumasi Campus', 'location' => 'Kwame Nkrumah University of Science and Technology (KNUST)', 'description' => 'Serving students in the Ashanti Region and beyond.'],
            ['name' => 'Greenhill Legon Campus', 'location' => 'Ghana Institute of Management and Public Administration (GIMPA) and UPSA', 'description' => 'Serving students in the Greater Accra Region.'],
        ];

        foreach ($campuses as $order => $campus) {
            Campus::updateOrCreate(
                ['name' => $campus['name']],
                ['location' => $campus['location'], 'description' => $campus['description'], 'order' => $order + 1]
            );
        }
    }
}
