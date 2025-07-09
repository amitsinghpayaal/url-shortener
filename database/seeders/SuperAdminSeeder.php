<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement("INSERT INTO users (name, email, password, role, company_id, created_at, updated_at) VALUES ('Super Admin', 'superadmin@urlshortener.com', '" . bcrypt('superadmin') . "', 'SuperAdmin', NULL, NOW(), NOW())");
    }
}
