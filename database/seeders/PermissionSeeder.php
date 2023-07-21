<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([[
            'name' => 'CategoryAccess',
            'group_name'=>'Category',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'SubCategoryAccess',
            'group_name'=>'Sub Category',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'NewsPostAccess',
            'group_name'=>'News Post',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'BannerAccess',
            'group_name'=>'Banner',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'PhotoAccess',
            'group_name'=>'Photo Gallery',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'VideoAccess',
            'group_name'=>'Video Gallery',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'LiveTvAccess',
            'group_name'=>'Live TV',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'SeoAccess',
            'group_name'=>'SEO Setting',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'SiteAccess',
            'group_name'=>'Site Setting',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'AdminAccess',
            'group_name'=>'Admin Setting',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'UserAccess',
            'group_name'=>'User Setting',
            'guard_name'=>'web', 
        ],
        [
            'name' => 'RoleAccess',
            'group_name'=>'Role And Permission Setting',
            'guard_name'=>'web', 
        ],
        ]);
    }
}
