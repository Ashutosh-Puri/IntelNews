<?php

namespace App\Http\Controllers\Backend;

use App\Models\SeoSetting;
use App\Http\Requests\StoreSeoSettingRequest;
use App\Http\Requests\UpdateSeoSettingRequest;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;

class SeoSettingController extends Controller{

    public function AllSeo(){

        $seo = SeoSetting::all();

        return view('backend.seo.all_seo',compact('seo'));

    }

    public function AddSeo(){

        return view('backend.seo.add_seo');

    }

    public function EditSeo($id){

        $seo = SeoSetting::findOrFail($id);

        return view('backend.seo.edit_seo',compact('seo'));

    }

    public function StoreSeo(Request $request){

        if(SeoSetting::count()>=1)
        {
            $notification = array(

                'message' => 'Only One Record Is Allowd..!',

                'alert-type' => 'success'

            );

            return redirect()->route('all.seo')->with($notification);
        }

        SeoSetting::create([

            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_author'       => $request->meta_author,
            'meta_keyword'      => $request->meta_keyword,

        ]);

        $notification = array(

            'message' => 'SEO Created Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.seo')->with($notification);

    }

    public function UpdateSeo(Request $request ,$id){

        SeoSetting::findOrFail($id)->update([

            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_author'       => $request->meta_author,
            'meta_keyword'      => $request->meta_keyword,

        ]);

        $notification = array(

            'message' => 'SEO Updated Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.seo')->with($notification);

    }

    public function DeleteSeo($id){

        SeoSetting::findOrFail($id)->delete();

        $notification = array(

            'message' => 'SEO Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.seo')->with($notification);

    }

}
