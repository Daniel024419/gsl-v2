<?php

namespace Database\Seeders;

use App\Models\OverviewObjective;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OverviewObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objectives = [
            'Provision of continuing legal education for professional lawyers and paralegals',
            'Provision of facilities to enable professional lawyers to specialize in various areas of the law',
            'Pupilage of newly enrolled lawyers',
            'Training of suitable persons to become professional lawyers',
        ];

        foreach ($objectives as $order => $text) {
            OverviewObjective::updateOrCreate(
                ['text' => $text],
                ['order' => $order + 1]
            );
        }
    }
}
