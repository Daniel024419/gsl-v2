<?php

namespace Database\Seeders;

use App\Models\OverviewPillar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OverviewPillarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pillars = [
            ['title' => 'Vision', 'description' => 'The vision of Ghana School of Law is to become a center of excellence in Africa and the world at large for professional legal training and research.'],
            ['title' => 'Mission', 'description' => "The General Legal Council ensures fair and efficient legal education and upholds high professional standards in Ghana's legal practice."],
            ['title' => 'Values', 'description' => 'Excellence · Integrity · Innovation · Inclusion · Collaboration · Service to the Legal Profession and to Ghana.'],
        ];

        foreach ($pillars as $order => $pillar) {
            OverviewPillar::updateOrCreate(
                ['title' => $pillar['title']],
                ['description' => $pillar['description'], 'order' => $order + 1]
            );
        }
    }
}
