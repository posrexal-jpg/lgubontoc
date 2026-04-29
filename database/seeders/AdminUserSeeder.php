<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the default administrator account.
     */
    public function run(): void
    {
        $now = now();

        $admin = [
            'name' => env('ADMIN_NAME', 'Administrator'),
            'email' => env('ADMIN_EMAIL', 'admin@bontoclgu.gov.ph'),
            'email_verified_at' => $now,
            'password' => Hash::make(env('ADMIN_PASSWORD', 'admin12345')),
            'updated_at' => $now,
        ];

        if (Schema::hasColumn('users', 'role')) {
            $admin['role'] = 'admin';
        }

        if (Schema::hasColumn('users', 'permissions')) {
            $admin['permissions'] = json_encode(['*']);
        }

        if (Schema::hasColumn('users', 'username')) {
            $admin['username'] = env('ADMIN_USERNAME', 'admin');
        }

        if (Schema::hasColumn('users', 'is_admin')) {
            $admin['is_admin'] = 1;
        }

        if (! DB::table('users')->where('email', $admin['email'])->exists()) {
            $admin['created_at'] = $now;
        }

        DB::table('users')->updateOrInsert(
            ['email' => $admin['email']],
            $admin
        );
    }
}
