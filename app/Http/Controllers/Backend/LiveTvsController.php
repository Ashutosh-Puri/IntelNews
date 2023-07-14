<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\LiveTvs;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\StoreLiveTvsRequest;
use App\Http\Requests\UpdateLiveTvsRequest;
use App\Http\Requests\Backend\LiveTvFormRequest;

class LiveTvsController extends Controller{

    

    public function AllLiveTv(){

        $livetv = LiveTvs::all();
        return view('backend.livetv.live_tv_all',compact('livetv'));

    }

    public function AddLiveTv(){

        return view('backend.livetv.live_tv_add');

    }

    public function StoreLiveTv(LiveTvFormRequest $request){

        if(LiveTvs::count()>=1)
        {
            $notification = array(

                'message' => 'Only One Record Is Allowd..!',

                'alert-type' => 'success'

            );

            return redirect()->route('all.live.tv')->with($notification);
        }
        

        if ($request->file('live_image')) {

            $image      = $request->file('live_image');

            $name_gen   = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

             

            Image::make($image)->resize(784,436)->save('upload/video/'.$name_gen);

            $save_url = 'upload/video/'.$name_gen;

            LiveTvs::create([

                'live_url'                  => $request->live_url,
                'post_date'                 => Carbon::now()->format('d F Y'),
                'live_image'                => $save_url,
                'created_at'                => Carbon::now(),
            ]);

            $notification = array(

                'message' => 'Live TV Created With Image Successfuly',

                'alert-type' => 'success'

            );

            return redirect()->route('all.live.tv')->with($notification);

        } else{

            LiveTvs::create([

                'live_url'                  => $request->live_url,
                'post_date'                 => Carbon::now()->format('d F Y'),
                'created_at'                => Carbon::now(),

            ]);

            $notification = array(

                'message' => 'Live TV Created Without Image Successfuly',

                'alert-type' => 'success'

            );

            return redirect()->route('all.live.tv')->with($notification);

        }

    }

  
    public function EditLiveTv($id){

        $livetv = LiveTvs::findOrfail($id);

        return view('backend.livetv.live_tv_edit',compact('livetv'));

    }

    

    public function UpdateLiveTv(LiveTvFormRequest $request ,$id){


        if ($request->file('live_image')) {

            $image      = $request->file('live_image');

            $name_gen   = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

             

            Image::make($image)->resize(784,436)->save('upload/video/'.$name_gen);

            $save_url = 'upload/video/'.$name_gen;

            LiveTvs::findOrFail($id)->update([

                'live_url'                  => $request->live_url,
                'post_date'                 => Carbon::now()->format('d F Y'),
                'live_image'                => $save_url,
                'created_at'                => Carbon::now(),

            ]);

            $notification = array(

                'message' => 'Live TV Updated With Image Successfuly',

                'alert-type' => 'success'

            );

            return redirect()->route('all.live.tv')->with($notification);

        } else{

            LiveTvs::findOrFail($id)->update([

                'live_url'                  => $request->live_url,
                'post_date'                 => Carbon::now()->format('d F Y'),
                'created_at'                => Carbon::now(),

            ]);

            $notification = array(

                'message' => 'Live TV Updated Without Image Successfuly',

                'alert-type' => 'success'

            );

            return redirect()->route('all.live.tv')->with($notification);

        }

    }


    public function DeleteLiveTv($id){

        $liveimage=LiveTvs::find($id);
        if(File::exists($liveimage->live_image )) {
            File::delete($liveimage->live_image);
        }
        
        $liveimage->delete();

        $notification = array(

            'message' => 'Live Tv Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}
