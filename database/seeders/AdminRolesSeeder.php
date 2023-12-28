<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_roles')->insert([
            ['title' => 'Super Admin', 'description' => 'Administrator with all administrative privileges on the system'],
            ['title' => 'Agent', 'description' => 'Administrator with limited administrative privileges on the system'],
        ]);
    }
}
