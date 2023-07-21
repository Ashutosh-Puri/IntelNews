<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'name' => 'Administrator',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'Editor',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'Reporter',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'Photographer',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'Videographer',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'SEO Specialist',
            'guard_name'=>'web', 
        ]]);
    }
}
