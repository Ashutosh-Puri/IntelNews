<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\LiveTvSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\NewsPostSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\SubCategorySeeder;
use Database\Seeders\ModelHasRoleSeeder;
use Database\Seeders\VideoGallerySeeder;
use Database\Seeders\RoleHasPermissionSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleHasPermissionSeeder::class,
            ModelHasRoleSeeder::class,
            BannerSeeder::class,
            CategorySeeder::class,
            LiveTvSeeder::class,
            SubCategorySeeder::class,
            VideoGallerySeeder::class,
            NewsPostSeeder::class,
        ]);
    }
}
