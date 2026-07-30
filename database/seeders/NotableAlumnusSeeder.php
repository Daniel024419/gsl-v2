<?php

namespace Database\Seeders;

use App\Models\NotableAlumnus;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotableAlumnusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alumni = [
            ['image' => '/files/assets/images/history/justice_brobbey 1.png', 'name' => 'Justice S.A Brobbey'],
            ['image' => '/files/assets/images/history/President-Atta-Mills 1.png', 'name' => 'Pres. J.E.A Mills'],
            ['image' => '/files/assets/images/history/Former-finance-minister-Kwesi-Botchwey-is-dead 1.png', 'name' => 'Dr. Kwesi Botchway'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'H.E. Prof. Turkson'],
            ['image' => '/files/assets/images/history/tawia-modibo-ocran-b5fc758c-8c5d-4016-be56-d61b1c3a6f7-resize-750 1.png', 'name' => 'Justice Modibo Ocran'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'Justice Adjabeng'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'Major General Donkor'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'Dr Bimpong Buta'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'Prof. Ofori Amankwah'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'Ignatius De Paul'],
            ['image' => '/files/assets/images/history/placeholder.png', 'name' => 'Mrs. Kokovi Tay'],
        ];

        foreach ($alumni as $order => $alumnus) {
            $person = Person::firstOrCreate(['name' => $alumnus['name']], ['image' => $alumnus['image']]);

            NotableAlumnus::updateOrCreate(
                ['person_id' => $person->id],
                ['order' => $order + 1]
            );
        }
    }
}
