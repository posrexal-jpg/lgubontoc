<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bontoc.gov.ph'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@bontoc.gov.ph',
                'password' => Hash::make('Admin@1234'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'bontoclgu@gmail.com'],
            [
                'name'     => 'Bontoc LGU',
                'email'    => 'bontoclgu@gmail.com',
                'password' => Hash::make('Bontoc@2024'),
            ]
        );
    }
}
