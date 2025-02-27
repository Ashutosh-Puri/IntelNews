<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\PhotoGalleries;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Backend\PhotoGalleryFormRequest;

class PhotoGalleryController extends Controller{

    public function AllPhotoGallery(){

        $photo = PhotoGalleries::latest()->get();

        return view('backend.photo.all_photo',compact('photo'));

    }

    public function AddPhotoGallery(){

        return view('backend.photo.add_photo');

    }

    public function StorePhotoGallery(PhotoGalleryFormRequest $request){

        $image = $request->file('multi_image');

        foreach ($image as $multi_image) {

            $name_gen   = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(700,400)->save('upload/multi/'.$name_gen);

            $save_url = 'upload/multi/'.$name_gen;

            PhotoGalleries::insert([

                'photo_gallery' => $save_url,
                'post_date'     => Carbon::now()->format('d F Y'),

            ]);

        }

        $notification = array(

            'message' => 'Photo Gallery Added Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.photo.gallery')->with($notification);

    }

    public function EditPhotoGallery($id){

        $photogallery = PhotoGalleries::findOrFail($id);

        return view('backend.photo.edit_photo',compact('photogallery'));

    }

    public function UpdatePhotoGallery(Request $request,$id){

        $image = $request->file('multi_image');

        foreach($image as $multi_image) {

            $name_gen   = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

            Image::make($multi_image)->resize(700,400)->save('upload/multi/'.$name_gen);

            $save_url = 'upload/multi/'.$name_gen;

            PhotoGalleries::insert([

                'photo_gallery' => $save_url,
                'post_date'     => Carbon::now()->format('d F Y'),

            ]);

        }

        $notification = array(

            'message' => 'Photo Gallery Added Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.photo.gallery')->with($notification);

        // if ($request->file('multi_image')) {

        //     $image = $request->file('multi_image');

        //     $name_gen   = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        //     Image::make($image)->resize(700,400)->save('upload/multi/'.$name_gen);

        //     $save_url = 'upload/multi/'.$name_gen;

        //     PhotoGalleries::findOrFail($id)->update([

        //         'photo_gallery' => $save_url,
        //         'post_date'     => Carbon::now()->format('d F Y'),

        //     ]);

        //     $notification = array(

        //         'message' => 'Photo Gallery Updated Successfuly',

        //         'alert-type' => 'success'

        //     );

        //     return redirect()->route('all.photo.gallery')->with($notification);

        // }

    }

    public function DeletePhotoGallery($id){

        $photo = PhotoGalleries::findOrFail($id);

        $img = $photo->photo_gallery;

        unlink($img);

        PhotoGalleries::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Photo Gallery Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}
