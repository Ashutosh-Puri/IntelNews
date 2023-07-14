<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\VideoGalleries;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoGalleriesRequest;
use App\Http\Requests\UpdateVideoGalleriesRequest;
use App\Http\Requests\Backend\VideoGalleryFormRequest;

class VideoGalleriesController extends Controller{

    public function AllVideoGallery(){

        $video = VideoGalleries::latest()->get();

        return view('backend.video.all_video',compact('video'));

    }

    public function AddVideoGallery(){

        return view('backend.video.add_video');

    }

    public function StoreVideoGallery(VideoGalleryFormRequest $request){

        $image      = $request->file('video_image');

        $name_gen   = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

          

        Image::make($image)->resize(784,436)->save('upload/video/'.$name_gen);

        $save_url = 'upload/video/'.$name_gen;

        VideoGalleries::insert([

            'video_title'               => $request->video_title,
            'video_url'                 => $request->video_url,
            'post_date'                 => Carbon::now()->format('d F Y'),
            'video_image'               => $save_url,
            'created_at'                => Carbon::now(),

        ]);

        $notification = array(

            'message' => 'Video Added Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.video.gallery')->with($notification);

    }

    public function EditVideoGallery($id){

        $video = VideoGalleries::findOrFail($id);

        return view('backend.video.edit_video',compact('video'));

    }

    public function UpdateVideoGallery(VideoGalleryFormRequest $request,$id){

        if ($request->file('video_image')) {

            $image      = $request->file('video_image');

            $name_gen   = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

             

            Image::make($image)->resize(784,436)->save('upload/video/'.$name_gen);

            $save_url = 'upload/video/'.$name_gen;

            VideoGalleries::findOrFail($id)->update([

                'video_title'               => $request->video_title,
                'video_url'                 => $request->video_url,
                'post_date'                 => Carbon::now()->format('d F Y'),
                'video_image'               => $save_url,
                'created_at'                => Carbon::now(),

            ]);

            $notification = array(

                'message' => 'Video Updated With Image Successfuly',

                'alert-type' => 'success'

            );

            return redirect()->route('all.video.gallery')->with($notification);

        } else{

            VideoGalleries::findOrFail($id)->update([

                'video_title'               => $request->video_title,
                'video_url'                 => $request->video_url,
                'post_date'                 => Carbon::now()->format('d F Y'),
                'created_at'                => Carbon::now(),

            ]);

            $notification = array(

                'message' => 'Video Updated Without Image Successfuly',

                'alert-type' => 'success'

            );

            return redirect()->route('all.video.gallery')->with($notification);

        }

    }

    public function DeleteVideoGallery($id){

        $video = VideoGalleries::findOrFail($id);

        $img = $video->video_image;

        unlink($img);

        VideoGalleries::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Video Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}
