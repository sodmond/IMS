<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin (Super User)
        $superuser = new Admin;
        $superuser->firstname = 'Super';
        $superuser->lastname = 'Admin';
        $superuser->email = 'admin@email.com';
        $superuser->role = 1;
        $superuser->password = Hash::make('malik005');
        $superuser->save();

        // Admin (Agent)
        $agent1 = new Admin;
        $agent1->firstname = 'First';
        $agent1->lastname = 'Agent';
        $agent1->email = 'agent1@email.com';
        $agent1->role = 2;
        $agent1->password = Hash::make('malik005');
        $agent1->save();
    }
}
