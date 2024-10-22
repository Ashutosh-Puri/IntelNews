<?php

namespace Database\Seeders;

use App\Models\VideoGalleries;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VideoGalleries::create( [
            'id'=>1,
            'video_image'=>'upload/video/1813595327368291.png',
            'video_title'=>'Major Anti-Terror Op Across J&K',
            'video_url'=>'https://www.ndtv.com/video/major-anti-terror-op-across-j-k-newly-formed-terror-group-dismantled-851843',
            'post_date'=>'22 October 2024',
            'created_at'=>'2024-10-22 01:11:24',
            'updated_at'=>NULL
            ] );
    }
}
