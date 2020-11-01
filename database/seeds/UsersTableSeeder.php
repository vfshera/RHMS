<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin account
        User::create([
           'image' => 'no-profile.png',
           'name' => 'Admin',
           'email' => 'admin@rhms.go.ke',
           'password' => Hash::make('superuser'),
           'status' => 1,
           'access' => 0
        ]);

        //engineers account
        User::create([
            'image' => 'no-profile.png',
            'name' => 'Anthony Greg',
            'email' => 'anto@engineers.org',
            'password' => Hash::make('engineer1'),
            'status' => 0,
            'access' => 1
        ]);

        //contractors account
       $contractor = User::create([
            'image' => 'no-profile.png',
            'name' => 'Jerry Fundi',
            'email' => 'jerryfundi@contractors.org',
            'password' => Hash::make('contractor1'),
           'status' => 0,
            'access' => 2
        ]);

        //road users account
        User::create([
            'image' => 'no-profile.png',
            'name' => 'Joshua Ngulo',
            'email' => 'joshu254@citizen.co.ke',
            'password' => Hash::make('citizen1'),
             'status' => 1,
            'access' => 3
        ]);
    }
}
