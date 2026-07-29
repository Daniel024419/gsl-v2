<?php

namespace Database\Seeders;

use App\Models\DepartmentHead;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['image' => '/files/assets/images/management/director.png', 'name' => 'Professor Raymond Atuguba', 'department' => 'Legal Department'],
            ['image' => '/files/assets/images/management/deputy-registrar.png', 'name' => 'Ms. Marian Atta-Boahene', 'department' => 'Academic Affairs'],
            ['image' => '/files/assets/mr.-yusif-osman_finance-resource-manager.jpeg', 'name' => 'Mr. Yusif Osman', 'department' => 'Finance & Resource Management'],
            ['image' => '/files/assets/mr.-leo-arthur-yarkwah_assurance-&-compliance.jpeg', 'name' => 'Mr. Leo Arthur Yarkwah', 'department' => 'Assurance & Compliance'],
            ['image' => '/files/assets/hr.jpg', 'name' => 'Mrs Louisa Condoberry-Asamoah', 'department' => 'People & Culture'],
            ['image' => '/files/assets/dr.-mrs.-georgina-ahorbo_student-experience-&-engagements.jpeg', 'name' => 'Dr. Mrs. Georgina Ahorbo', 'department' => 'Student Experience & Engagements'],
            ['image' => '/files/assets/mrs.-janet-odetsi-twum_learning-resources-&-knowledge-services.jpeg', 'name' => 'Mrs. Janet Odetsi-Twum', 'department' => 'Learning Resources & Knowledge Services'],
            ['image' => '/files/assets/lorraine-e.ocloo.png', 'name' => 'Ms. Lorraine Ocloo', 'department' => 'Digital Transformation & Innovation'],
            ['image' => '/files/assets/mr.-enyo-tawiah_facilities,-operations-&-logistics.jpeg', 'name' => 'Mr. Enyo Tawiah', 'department' => 'Facilities, Operations & Logistics'],
            ['image' => '/files/assets/whatsapp-image-2026-05-27-at-5.30.25-pm(1).jpeg', 'name' => 'Francisca Kakra Forson', 'department' => 'Corporate Affairs'],
        ];

        foreach ($members as $order => $member) {
            $person = Person::firstOrCreate(['name' => $member['name']], ['image' => $member['image']]);
            $role = Role::firstOrCreate(['name' => $member['department']]);

            DepartmentHead::updateOrCreate(
                ['person_id' => $person->id],
                ['role_id' => $role->id, 'order' => $order + 1]
            );
        }
    }
}
