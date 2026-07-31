<?php

namespace Database\Seeders;

use App\Models\FooterContactItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterContactItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['icon' => 'heroicon-o-map-pin', 'label' => 'Independence Avenue, Makola, Accra', 'link' => null],
            ['icon' => 'heroicon-o-phone', 'label' => '+233 307 003 231', 'link' => 'tel:+233307003231'],
            ['icon' => 'heroicon-o-envelope', 'label' => 'enquiries@gslaw.edu.gh', 'link' => 'mailto:enquiries@gslaw.edu.gh'],
            ['icon' => 'heroicon-o-envelope', 'label' => 'admissions@gslaw.edu.gh', 'link' => 'mailto:admissions@gslaw.edu.gh'],
        ];

        foreach ($items as $order => $item) {
            FooterContactItem::updateOrCreate(
                ['label' => $item['label']],
                [
                    'icon' => $item['icon'],
                    'link' => $item['link'],
                    'order' => $order + 1,
                ]
            );
        }
    }
}
