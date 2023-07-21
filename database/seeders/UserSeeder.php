<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Admin',
            'username'=>'Ashutosh Puri',
            'email' => 'cmdsofts@gmail.com',
            'password' => Hash::make('123456789'),
            'role'=>'admin',
            'status'=>'active',
        ],
        [
            'name' => 'Ashutosh',
            'username'=>'Ashutosh Puri',
            'email' => 'ashutoshpuri2000@gmail.com',
            'password' => Hash::make('123456789'),
            'role'=>'user',
            'status'=>'active',
        ]]);
    }
}
