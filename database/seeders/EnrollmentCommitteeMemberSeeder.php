<?php

namespace Database\Seeders;

use App\Models\EnrollmentCommitteeMember;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentCommitteeMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['image' => '/files/assets/images/management/justice-of-supreme-court-1.png', 'name' => 'His Lordship Justice Gabriel Pwamang JSC', 'role' => 'Chairman'],
            ['image' => '/files/assets/images/management/then-ag-judicial-secretary.png', 'name' => 'Dr. Cyracus B. Bapuuroh', 'role' => 'Then Ag. Judicial Secretary & Ag. Secretary GLC, Member'],
            ['image' => '/files/assets/images/management/director.png', 'name' => 'Professor Raymond Atuguba', 'role' => 'Ag. Director of Legal Education & Director GSL, Member'],
            ['image' => '/files/assets/images/management/gesila-adanu.png', 'name' => 'H/L Justice Franklina Gesila Adanu J A', 'role' => 'Counsel GLC, Member'],
            ['image' => '/files/assets/images/management/registrar.png', 'name' => 'Mrs. Juliet Adu-Adjei', 'role' => 'Registrar GSL, Member'],
            ['image' => '/files/assets/images/management/deputy-registrar.png', 'name' => 'Ms. Marian Atta-Boahene', 'role' => 'Dep. Registrar GSL, Member'],
            ['image' => '/files/assets/images/management/chief-accountant.png', 'name' => 'Mr. Yussif Osman', 'role' => 'Chief Accountant, GLC, Member'],
            ['image' => '/files/assets/images/management/v-vanderpuije.png', 'name' => 'Mr. Viktor Vanderpuije', 'role' => 'Asst. Registrar/Snr. Protocol Officer GSL, Secretary/Member'],
            ['image' => '/files/assets/images/management/georgina-awuku-apaw.png', 'name' => 'Miss Georgina Awuku-Apaw', 'role' => 'Principal Administrative Officer, GLC, Member'],
        ];

        foreach ($members as $order => $member) {
            $person = Person::firstOrCreate(['name' => $member['name']], ['image' => $member['image']]);
            $role = Role::firstOrCreate(['name' => $member['role']]);

            EnrollmentCommitteeMember::updateOrCreate(
                ['person_id' => $person->id],
                ['role_id' => $role->id, 'order' => $order + 1]
            );
        }
    }
}
