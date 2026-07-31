<?php

namespace Database\Seeders;

use App\Models\FooterLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            ['label' => 'Student Portal', 'url' => 'https://sms.gslaw.school/portal'],
            ['label' => 'Lecturer Portal', 'url' => 'https://sms.gslaw.school/faculty'],
            ['label' => 'Staff Portal', 'url' => 'https://sms.gslaw.school/admin'],
            ['label' => 'Buy Admission Voucher', 'url' => '/admissions/instructions'],
            ['label' => 'GSL Wikipedia', 'url' => 'https://en.wikipedia.org/wiki/Ghana_School_of_Law'],
            ['label' => 'Notices', 'url' => '/notices'],
        ];

        foreach ($links as $order => $link) {
            FooterLink::updateOrCreate(
                ['label' => $link['label']],
                [
                    'link_type' => 'url',
                    'url' => $link['url'],
                    'target' => '_blank',
                    'order' => $order + 1,
                ]
            );
        }
    }
}
