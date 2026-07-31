<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programmes = [
            ['title' => 'Pre-Bar Course', 'route_name' => 'programmes.pre-bar-course'],
            ['title' => 'Law Practice Training (LPT)', 'route_name' => 'programmes.law-practice-training'],
            ['title' => 'Post-Call Law Course', 'route_name' => 'programmes.post-call-law-course'],
            ['title' => 'Bar Exam Remedial', 'route_name' => 'programmes'],
            ['title' => 'Specialised Development', 'route_name' => 'programmes'],
        ];

        foreach ($programmes as $order => $programme) {
            Programme::updateOrCreate(
                ['title' => $programme['title']],
                ['route_name' => $programme['route_name'], 'order' => $order + 1]
            );
        }
    }
}
