<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'       => 'Super Admin',
            'email'      => 'superadmin@urlshortener.com',
            'password'   => Hash::make('superadmin'),
            'role'       => 'SuperAdmin',
            'company_id' => null,
        ]);
    }
}

