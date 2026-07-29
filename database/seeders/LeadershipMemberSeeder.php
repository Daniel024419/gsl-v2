<?php

namespace Database\Seeders;

use App\Models\LeadershipMember;
use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeadershipMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['image' => '/files/assets/images/management/director.png', 'name' => 'Professor Raymond Atuguba', 'role' => 'Ag. Director of Legal Education & Ag. Director, Ghana School of Law'],
            ['image' => '/files/assets/images/management/registrar.png', 'name' => 'Mrs. Juliet Adu-Adjei', 'role' => 'Registrar, Ghana School of Law'],
            ['image' => '/files/assets/images/management/deputy-registrar.png', 'name' => 'Ms. Marian Atta-Boahene', 'role' => 'Deputy Registrar, Ghana School of Law'],
            ['image' => '/files/assets/images/management/chief-accountant.png', 'name' => 'Mr. Yussif Osman', 'role' => 'Chief Accountant, General Legal Council (Ghana School of Law)'],
            ['image' => '/files/assets/images/management/campus-cordinator.png', 'name' => 'Mr. Michael Gyang Owusu', 'role' => 'Campus Coordinator'],
        ];

        foreach ($members as $order => $member) {
            $person = Person::firstOrCreate(['name' => $member['name']], ['image' => $member['image']]);
            $role = Role::firstOrCreate(['name' => $member['role']]);

            LeadershipMember::updateOrCreate(
                ['person_id' => $person->id],
                ['role_id' => $role->id, 'order' => $order + 1]
            );
        }
    }
}
