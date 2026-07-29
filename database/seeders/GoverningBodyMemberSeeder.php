<?php

namespace Database\Seeders;

use App\Models\GoverningBodyMember;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoverningBodyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['image' => '/files/assets/images/management/ag-chief-justice.png', 'name' => 'His Lordship Justice Paul Baffoe-Bonnie', 'role' => 'Chief Justice & Ag. Chairperson'],
            ['image' => '/files/assets/images/management/justice-of-supreme-court-1.png', 'name' => 'His Lordship Justice Gabriel Pwamang', 'role' => 'Justice of the Supreme Court'],
            ['image' => '/files/assets/images/management/justice-of-the-supreme-court-2.png', 'name' => 'Her Ladyship Justice Avril Lovelace-Johnson', 'role' => 'Justice of the Supreme Court'],
            ['image' => '/files/assets/images/management/attorney-general.png', 'name' => 'Hon. Dr. Dominic Akuritinga Ayine', 'role' => 'Attorney-General and Minister for Justice'],
            ['image' => '/files/assets/images/management/deputy-ag.png', 'name' => 'Dr. Justice Srem-Sai', 'role' => 'Dep. Attorney-General and Dep. Minister for Justice'],
            ['image' => '/files/assets/images/management/legal-practitioner.png', 'name' => 'Dr. Abdul-Bassit Aziz Bamba', 'role' => 'Legal Practitioner'],
            ['image' => '/files/assets/images/management/legal-practitioner-2.png', 'name' => 'Mrs. Clara Beeri Kasser-Tee', 'role' => 'Legal Practitioner'],
            ['image' => '/files/assets/images/management/national-pres-ghana-bar.png', 'name' => 'Mrs. Efua Ghartey', 'role' => 'National President, Ghana Bar Association'],
            ['image' => '/files/assets/images/management/national-vice-pres-ghana-bar.png', 'name' => 'Mrs. Victoria Barth', 'role' => 'National Vice President, Ghana Bar Association'],
            ['image' => '/files/assets/images/management/pres-central-region-bar.png', 'name' => 'Mr. Samuel Adu Yeboah', 'role' => 'President, Central Regional Bar Association'],
            ['image' => '/files/assets/images/management/national-secretary-gba.png', 'name' => 'Mr. Kwaku Gyau Baffour', 'role' => 'National Secretary, Ghana Bar Association'],
            ['image' => '/files/assets/images/management/dean-ug.png', 'name' => 'Prof. Peter Atudiwe Atupare', 'role' => 'Dean, University of Ghana Law School, Legon'],
            ['image' => '/files/assets/images/management/judiciary-secretary.png', 'name' => 'Mr. Issah Ahmed', 'role' => 'Judicial Secretary and Secretary, GLC'],
        ];

        foreach ($members as $order => $member) {
            $person = Person::firstOrCreate(['name' => $member['name']], ['image' => $member['image']]);
            $role = Role::firstOrCreate(['name' => $member['role']]);

            GoverningBodyMember::updateOrCreate(
                ['person_id' => $person->id],
                ['role_id' => $role->id, 'order' => $order + 1]
            );
        }
    }
}
