<?php

namespace Database\Seeders;

use App\Models\GalleryPhoto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photos = [
            ['image' => '/files/assets/images/homepage/campuslife.png', 'caption' => 'The Ghana School of Law campus', 'size' => 'large'],
            ['image' => '/files/assets/images/homepage/campuslife2.png', 'caption' => 'A newly-called lawyer celebrating with peers', 'size' => 'tall'],
            ['image' => '/files/assets/images/homepage/career-series-img.png', 'caption' => 'Students at a GSL ceremony', 'size' => 'normal'],
            ['image' => '/files/assets/images/homepage/award.png', 'caption' => 'A student receiving recognition at a GSL ceremony', 'size' => 'wide'],
            ['image' => '/files/assets/images/homepage/full roll.png', 'caption' => 'Graduating students seated at a GSL ceremony', 'size' => 'normal'],
            ['image' => '/files/assets/images/homepage/test1.png', 'caption' => 'Newly-called lawyers at the Call to the Bar', 'size' => 'tall'],
            ['image' => '/files/assets/images/homepage/plc.png', 'caption' => 'GSL students', 'size' => 'normal'],
            ['image' => '/files/assets/images/homepage/prgimg.png', 'caption' => 'A student in the law library', 'size' => 'wide'],
        ];

        foreach ($photos as $order => $photo) {
            GalleryPhoto::updateOrCreate(
                ['image' => $photo['image']],
                ['caption' => $photo['caption'], 'size' => $photo['size'], 'order' => $order + 1]
            );
        }
    }
}
