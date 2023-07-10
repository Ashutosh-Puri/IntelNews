<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('users')->insert([

            [

                // Admin
                'name'          => 'Admin',
                'username'      => 'admin',
                'email'         => 'cmdsofts@gmail.com',
                'password'      => Hash::make('123456789'),
                'role'          => 'admin',
                'status'        => 'active',

            ],

            [

                // User
                'name'          => 'Ashutosh',
                'username'      => 'Ashutosh Puri',
                'email'         => 'user@gmail.com',
                'password'      => Hash::make('111'),
                'role'          => 'user',
                'status'        => 'active',

            ]

        ]);

    }
}
