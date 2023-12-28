<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->firstname = 'John';
        $user1->lastname = 'Doe';
        $user1->email = 'sodmond@yahoo.com';
        $user1->password = Hash::make('malik005');
        $user1->save();

        $user2 = new User();
        $user2->firstname = 'Sarah';
        $user2->lastname = 'Doe';
        $user2->email = 'sodmond@outlook.com';
        $user2->password = Hash::make('malik005');
        $user2->save();
    }
}
