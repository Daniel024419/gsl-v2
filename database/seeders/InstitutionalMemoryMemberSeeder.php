<?php

namespace Database\Seeders;

use App\Models\InstitutionalMemoryMember;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionalMemoryMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['image' => '/files/assets/images/management/ag-chief-justice.png', 'name' => 'His Lordship Justice Paul Baffoe-Bonnie', 'date_from' => 2025, 'date_to' => null],
            ['image' => '/files/assets/images/management/sackey-torkorno.png', 'name' => 'Hon. Justice Gertrude A.E. Sackey Torkorno', 'date_from' => 2023, 'date_to' => 2025],
            ['image' => '/files/assets/images/management/annin-yeboah.png', 'name' => 'Hon. Justice Annin Yeboah', 'date_from' => 2020, 'date_to' => 2023],
            ['image' => '/files/assets/images/management/akuffo-archer.png', 'name' => 'Hon. Sophia A.B. Akuffo Archer', 'date_from' => 2017, 'date_to' => 2019],
            ['image' => '/files/assets/images/management/georgina-t-wood.png', 'name' => 'Hon. Mrs. Georgina T. Wood', 'date_from' => 2007, 'date_to' => 2017],
            ['image' => '/files/assets/images/management/jk-acquah.png', 'name' => 'Hon. Mr. Justice G.K. Acquah', 'date_from' => 2003, 'date_to' => 2006],
            ['image' => '/files/assets/images/management/ek-wiredu.png', 'name' => 'Hon. Mr. Justice E.K Wiredu', 'date_from' => 2001, 'date_to' => 2003],
            ['image' => '/files/assets/images/management/ik-abban.png', 'name' => 'Hon. Mr. Justice I.K Abban', 'date_from' => 1995, 'date_to' => 2001],
            ['image' => '/files/assets/images/management/penk-archer.png', 'name' => 'Hon. Mr. Justice P.E.N.K. Archer', 'date_from' => 1991, 'date_to' => 1995],
            ['image' => '/files/assets/images/management/nyb-adade.png', 'name' => 'Hon. Mr. Justice N.Y.B. Adade (Ag.)', 'date_from' => 1990, 'date_to' => 1991],
            ['image' => '/files/assets/images/management/enp-sowah.png', 'name' => 'Hon. Mr. Justice E.N.P. Sowah', 'date_from' => 1986, 'date_to' => 1990],
            ['image' => '/files/assets/images/management/justice-apaloo.png', 'name' => 'Hon. Justice Apaloo', 'date_from' => 1977, 'date_to' => 1985],
            ['image' => '/files/assets/images/management/azu-crabbe.png', 'name' => 'Hon. Mr. Justice Azu Crabbe', 'date_from' => 1972, 'date_to' => 1977],
            ['image' => '/files/assets/images/management/justice-bannerman.png', 'name' => 'Hon. Mr. Justice Bannerman', 'date_from' => 1970, 'date_to' => 1972],
            ['image' => '/files/assets/images/management/akuffo-addo.png', 'name' => 'Hon. Mr. Justice Akuffo-Addo', 'date_from' => 1966, 'date_to' => 1970],
            ['image' => '/files/assets/images/management/sarkodie-addo.png', 'name' => 'Hon. Mr. Justice Sarkodie-Addo', 'date_from' => 1964, 'date_to' => 1966],
            ['image' => '/files/assets/images/management/arku-korsah.png', 'name' => 'Hon. Justice Sir Arku Korsah', 'date_from' => 1958, 'date_to' => 1963],
        ];

        foreach ($members as $order => $member) {
            $person = Person::firstOrCreate(['name' => $member['name']], ['image' => $member['image']]);

            InstitutionalMemoryMember::updateOrCreate(
                ['person_id' => $person->id],
                ['date_from' => $member['date_from'], 'date_to' => $member['date_to'], 'order' => $order + 1]
            );
        }
    }
}
