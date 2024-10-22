<?php

namespace Database\Seeders;

use App\Models\LiveTvs;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LiveTvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LiveTvs::create( [
            'id'=>1,
            'live_image'=>'upload/video/1813595438650889.png',
            'live_url'=>'https://www.ndtv.com/video/top-headlines-of-the-day-october-21-2024-851403',
            'post_date'=>'22 October 2024',
            'created_at'=>'2024-10-22 01:13:10',
            'updated_at'=>'2024-10-22 01:13:10'
            ] );
            
            
    }
}
