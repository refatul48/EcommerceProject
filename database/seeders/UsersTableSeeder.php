<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // admin

            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'phone' => '+8801775282986',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
                'status' => 'active'
            ],

            // user


            // [
            //     'name' => 'user',
            //     'username' => 'user',
            //     'email' => 'user@gmail.com',
            //     'phone' => '+8801775282985',
            //     'password' => Hash::make('123456789'),
            //     'role' => 'user',
            //     'status' => 'active'
            // ],

            // [
            //     'name' => 'User',
            //     'username' => 'user',
            //     'email' => 'user@gmail.com',
            //     'password' => Hash::make('111'),
            //     'role' => 'user',
            //     'status' => 'active'
            // ],

        ]);
    }
}
