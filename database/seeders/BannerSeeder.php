<?php

namespace Database\Seeders;

use App\Models\Banners;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banners::create( [
            'id'=>1,
            'home_one'=>'upload/banner/1813594434164964.jpeg',
            'home_two'=>'upload/banner/1813594539341432.jpeg',
            'home_three'=>NULL,
            'home_four'=>NULL,
            'news_category_one'=>NULL,
            'news_details_one'=>NULL,
            'created_at'=>'2024-10-22 00:56:33',
            'updated_at'=>'2024-10-22 00:58:52'
            ] );
            
            
    }
}
