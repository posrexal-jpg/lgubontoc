<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barangay;

class BarangaySeeder extends Seeder
{
    public function run(): void
    {
        $barangays = [
            ['name' => 'Bag-ong Lipunan',   'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Bao-bao',            'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Basiao',             'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Bontoc (Poblacion)', 'captain' => null, 'area' => null, 'population' => null, 'description' => 'The poblacion (town center) of Bontoc, Southern Leyte.'],
            ['name' => 'Cagnituan',          'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Catmon',             'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Cawayan',            'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Concepcion',         'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Dao',                'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Gakat',              'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Jubasan',            'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Lahong Interior',    'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Lahong Proper',      'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Magkieb',            'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'New Katipunan',      'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Olanivan',           'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Panian',             'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'San Isidro',         'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'San Juan',           'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'San Vicente',        'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Superficial',        'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Taytay',             'captain' => null, 'area' => null, 'population' => null, 'description' => null],
            ['name' => 'Tinago',             'captain' => null, 'area' => null, 'population' => null, 'description' => null],
        ];

        foreach ($barangays as $data) {
            Barangay::updateOrCreate(
                ['name' => $data['name']],
                array_merge($data, ['active' => true])
            );
        }
    }
}
