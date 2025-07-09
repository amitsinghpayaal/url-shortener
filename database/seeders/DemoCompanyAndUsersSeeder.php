<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoCompanyAndUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = \App\Models\Company::create([
            'name' => 'Company1',
        ]);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@urlshortener.com',
            'password' => bcrypt('admin'),
            'role' => 'Admin',
            'company_id' => $company->id,
        ]);

        \App\Models\User::create([
            'name' => 'Member1',
            'email' => 'member1@urlshortener.com',
            'password' => bcrypt('member1'),
            'role' => 'Member',
            'company_id' => $company->id,
        ]);

        \App\Models\User::create([
            'name' => 'Member2',
            'email' => 'member2@urlshortener.com',
            'password' => bcrypt('member2'),
            'role' => 'Member',
            'company_id' => $company->id,
        ]);
    }
}
