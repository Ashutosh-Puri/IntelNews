<?php

namespace App\Http\Controllers\Backend;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Backend\SiteSettingFormRequest;

class SiteSettingController extends Controller
{
    
    public function AllSiteSetting(){

        $sitesetting = SiteSetting::all();
        return view('backend.sitesetting.all_sitesetting',compact('sitesetting'));

    }

    public function AddSiteSetting(){

        return view('backend.sitesetting.add_sitesetting');

    }

    public function StoreSiteSetting(SiteSettingFormRequest $request){

        if(SiteSetting::count()>=1)
        {
            $notification = array(

                'message' => 'Only One Record Is Allowd..!',

                'alert-type' => 'error'

            );

            return redirect()->route('all.site.setting')->with($notification);
        }
        
        $sitesetting = new SiteSetting;
        if ($request->file('logo_small')) {

            $image      = $request->file('logo_small');

            $name   = 'logo_small.'.$image->getClientOriginalExtension();
  
            $image->move('upload/logo',$name);

            $sitesetting->logo_small= $save_url1 = 'upload/logo/'.$name;
        }

        if ($request->hasFile('logo_large')) {

            $image      = $request->file('logo_large');

            $name   = 'logo_large.'.$image->getClientOriginalExtension();
  
            $image->move('upload/logo',$name);

            $sitesetting->logo_large= $save_url2 = 'upload/logo/'.$name;
        }

        if ($request->file('favicon')) {

            $image      = $request->file('favicon');

            $name   = 'favicon.'.$image->getClientOriginalExtension();
  
            $image->move('upload/logo',$name);

            $sitesetting->favicon= $save_url3 = 'upload/logo/'.$name;
        }

        $sitesetting->dev_name=$request->dev_name;
        $sitesetting->dev_company=$request->dev_company;
        $sitesetting->dev_site=$request->dev_site;
        $sitesetting->address=$request->address;
        $sitesetting->email=$request->email;
        $sitesetting->phone=$request->phone;
        $sitesetting->social_icon_1=$request->social_icon_1;
        $sitesetting->social_icon_1_url=$request->social_icon_1_url;
        $sitesetting->social_icon_2=$request->social_icon_2;
        $sitesetting->social_icon_2_url=$request->social_icon_2_url;
        $sitesetting->social_icon_3=$request->social_icon_3;
        $sitesetting->social_icon_3_url=$request->social_icon_3_url;
        $sitesetting->social_icon_4=$request->social_icon_4;
        $sitesetting->social_icon_4_url=$request->social_icon_4_url;
        $sitesetting->save();
            
        $notification = array(

            'message' => 'Site Setting Created Successfuly',

            'alert-type' => 'success'

        );

         return redirect()->route('all.site.setting')->with($notification);
    }

  
    public function EditSiteSetting($id){

        $sitesetting = SiteSetting::findOrfail($id);

        return view('backend.sitesetting.edit_sitesetting',compact('sitesetting'));

    }

    

    public function UpdateSiteSetting(SiteSettingFormRequest $request ,$id){

        
        $sitesetting =SiteSetting::findOrFail($id);
        if ($request->file('logo_small')) {

            $image      = $request->file('logo_small');

            $name   = 'logo_small.'.$image->getClientOriginalExtension();
  
            $image->move('upload/logo',$name);

            $sitesetting->logo_small= $save_url1 = 'upload/logo/'.$name;
        }

        if ($request->hasFile('logo_large')) {

            $image      = $request->file('logo_large');

            $name   = 'logo_large.'.$image->getClientOriginalExtension();
  
            $image->move('upload/logo',$name);

            $sitesetting->logo_large= $save_url2 = 'upload/logo/'.$name;
        }

        if ($request->file('favicon')) {

            $image      = $request->file('favicon');

            $name   = 'favicon.'.$image->getClientOriginalExtension();
  
            $image->move('upload/logo',$name);

            $sitesetting->favicon= $save_url3 = 'upload/logo/'.$name;
        }

        $sitesetting->dev_name=$request->dev_name;
        $sitesetting->dev_company=$request->dev_company;
        $sitesetting->dev_site=$request->dev_site;
        $sitesetting->address=$request->address;
        $sitesetting->email=$request->email;
        $sitesetting->phone=$request->phone;
        $sitesetting->social_icon_1=$request->social_icon_1;
        $sitesetting->social_icon_1_url=$request->social_icon_1_url;
        $sitesetting->social_icon_2=$request->social_icon_2;
        $sitesetting->social_icon_2_url=$request->social_icon_2_url;
        $sitesetting->social_icon_3=$request->social_icon_3;
        $sitesetting->social_icon_3_url=$request->social_icon_3_url;
        $sitesetting->social_icon_4=$request->social_icon_4;
        $sitesetting->social_icon_4_url=$request->social_icon_4_url;
        $sitesetting->update();
            
        $notification = array(

            'message' => 'Site Setting Updated Successfuly',

            'alert-type' => 'success'

        );

         return redirect()->route('all.site.setting')->with($notification);
    }


    public function DeleteSiteSetting($id){

        $sitesetting =SiteSetting::findOrFail($id);
        if(File::exists( $sitesetting->logo_small )) {
            File::delete( $sitesetting->logo_small);
        }

        if(File::exists( $sitesetting->logo_large)) {
            File::delete( $sitesetting->logo_large);
        }

        if(File::exists( $sitesetting->favicon)) {
            File::delete( $sitesetting->favicon);
        }
        
        $sitesetting->delete();

        $notification = array(

            'message' => 'Site Setting Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }
}
