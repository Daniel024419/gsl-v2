<?php

namespace Database\Seeders;

use App\Models\Directorate;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directorates = [
            ['title' => 'Ghana School of Law', 'name' => 'Prof. Raymond A. Atuguba', 'image' => '/files/assets/images/management/director.png'],
            ['title' => 'Curriculum Delivery & Testing', 'name' => 'Ms. Marian Atta-Boahene', 'image' => '/files/assets/images/management/deputy-registrar.png'],
            ['title' => 'Accreditation, Quality Assurance & Inspectorate', 'name' => 'Mr. Kwame Awadzi', 'image' => null],
            ['title' => 'Learning, Research & Knowledge Services', 'name' => 'Mrs. Janet Odetsi-Twum', 'image' => '/files/assets/mrs.-janet-odetsi-twum_learning-resources-&-knowledge-services.jpeg'],
            ['title' => 'Digital Transformation & Innovation', 'name' => 'Ms. Lorraine Ocloo', 'image' => '/files/assets/lorraine-e.ocloo.png'],
            ['title' => 'Corporate Communications & Partnerships', 'name' => 'Ms. Francisca Kakra Forson', 'image' => '/files/assets/whatsapp-image-2026-05-27-at-5.30.25-pm(1).jpeg'],
            ['title' => 'People, Talent & Culture', 'name' => 'Mrs. Louisa D. Condobery-Asamoah', 'image' => '/files/assets/mrs.-louisa-condobery-asamoah_-people-&-culture.jpeg'],
            ['title' => 'Finance & Resource Mobilisation', 'name' => 'Mr. Yussif Osman', 'image' => '/files/assets/mr.-yusif-osman_finance-resource-manager.jpeg'],
            ['title' => 'Safety, Facilities & Logistics', 'name' => 'Mr. Enyo Tawiah', 'image' => '/files/assets/mr.-enyo-tawiah_facilities,-operations-&-logistics.jpeg'],
            ['title' => 'Compliance & Assurance', 'name' => 'Mr. Leo Yarkwa Arthur', 'image' => '/files/assets/mr.-leo-arthur-yarkwah_assurance-&-compliance.jpeg'],
        ];

        foreach ($directorates as $order => $directorate) {
            $person = Person::firstOrCreate(['name' => $directorate['name']], ['image' => $directorate['image']]);

            Directorate::updateOrCreate(
                ['title' => $directorate['title']],
                ['person_id' => $person->id, 'order' => $order + 1]
            );
        }
    }
}
