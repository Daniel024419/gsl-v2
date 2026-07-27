<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'eyebrow' => 'Ghana School of Law',
                'heading' => 'Your Journey to<br> <span class="text-gold">The Bar</span><br> Starts Here',
                'text' => "Statutory administration, professional legal training, and the official pathway to Ghana's Bar, now under the CLET framework (Act 1170).",
                'image' => '/files/GSL.png',
                'buttons' => [
                    ['label' => 'Explore Our Mandate', 'route' => 'programmes', 'style' => 'primary'],
                    ['label' => 'Apply Now', 'route' => 'admissions', 'style' => 'secondary'],
                ],
                'order' => 1,
            ],
            [
                'eyebrow' => 'Campus & Community',
                'heading' => 'Experience<br> <span class="text-gold">Student Life</span><br> at GSL',
                'text' => 'From mock courtrooms to moot competitions and student associations, life at GSL builds the community and character behind every call to the Bar.',
                'image' => '/files/assets/images/homepage/campuslife.png',
                'buttons' => [
                    ['label' => 'Explore Student Life', 'route' => 'student-life', 'style' => 'primary'],
                ],
                'order' => 2,
            ],
            [
                'eyebrow' => 'Events Calendar',
                'heading' => 'Join Our<br> <span class="text-gold">Signature Events</span><br> & Ceremonies',
                'text' => 'Inductions, orientations, and the annual Call to the Bar - see what\'s coming up across our Accra and Kumasi campuses.',
                'image' => '/files/assets/images/news/call_to_bar.png',
                'buttons' => [
                    ['label' => 'View Events', 'route' => 'events', 'style' => 'primary'],
                ],
                'order' => 3,
            ],
            [
                'eyebrow' => 'Latest Updates',
                'heading' => 'Stay Informed<br> <span class="text-gold">With GSL News</span>',
                'text' => 'Institutional news, academic milestones, and updates on our transformation as a Directorate of CLET.',
                'image' => '/files/assets/images/news/orientation.png',
                'buttons' => [
                    ['label' => 'Read Latest News', 'route' => 'news', 'style' => 'primary'],
                ],
                'order' => 4,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(
                ['eyebrow' => $slide['eyebrow'], 'order' => $slide['order']],
                $slide
            );
        }
    }
}