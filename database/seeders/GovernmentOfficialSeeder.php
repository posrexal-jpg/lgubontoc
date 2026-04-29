<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GovernmentOfficial;

class GovernmentOfficialSeeder extends Seeder
{
    public function run(): void
    {
        $officials = [
            // Elected Officials
            [
                'name'       => 'Hon. [Mayor Name]',
                'position'   => 'Municipal Mayor',
                'office'     => 'Elected Officials',
                'contact'    => '+63-9566483040',
                'bio'        => 'The Municipal Mayor of Bontoc, Southern Leyte, leads the local government in its mission to serve the community.',
                'sort_order' => 1,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Vice Mayor Name]',
                'position'   => 'Municipal Vice Mayor',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => 'The Municipal Vice Mayor presides over the Sangguniang Bayan sessions.',
                'sort_order' => 2,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 1]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 3,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 2]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 4,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 3]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 5,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 4]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 6,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 5]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 7,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 6]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 8,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 7]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 9,
                'active'     => true,
            ],
            [
                'name'       => 'Hon. [Councilor 8]',
                'position'   => 'Sangguniang Bayan Member',
                'office'     => 'Elected Officials',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 10,
                'active'     => true,
            ],
            // Department Heads
            [
                'name'       => '[Municipal Administrator]',
                'position'   => 'Municipal Administrator',
                'office'     => 'Department Heads',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 11,
                'active'     => true,
            ],
            [
                'name'       => '[Municipal Treasurer]',
                'position'   => 'Municipal Treasurer',
                'office'     => 'Department Heads',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 12,
                'active'     => true,
            ],
            [
                'name'       => '[Municipal Assessor]',
                'position'   => 'Municipal Assessor',
                'office'     => 'Department Heads',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 13,
                'active'     => true,
            ],
            [
                'name'       => '[Municipal Civil Registrar]',
                'position'   => 'Municipal Civil Registrar',
                'office'     => 'Department Heads',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 14,
                'active'     => true,
            ],
            [
                'name'       => '[Municipal Health Officer]',
                'position'   => 'Municipal Health Officer',
                'office'     => 'Department Heads',
                'contact'    => null,
                'bio'        => null,
                'sort_order' => 15,
                'active'     => true,
            ],
        ];

        foreach ($officials as $data) {
            GovernmentOfficial::updateOrCreate(
                ['name' => $data['name'], 'position' => $data['position']],
                $data
            );
        }
    }
}
