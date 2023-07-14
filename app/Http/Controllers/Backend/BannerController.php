<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Banners;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Http\Requests\Backend\BannerFormRequest;

class BannerController extends Controller{

    public function AllBanner(){

        $banner = Banners::all();
        return view('backend.banner.all_banner',compact('banner'));

    }

    public function AddBanner(){

        return view('backend.banner.add_banner');

    }
    public function StoreBanner(Banners $banner,BannerFormRequest $request){

        if($banner->count()>=1)
        {
            $notification = array(
    
                'message' => 'Only One Record Is Allowd!',
    
                'alert-type' => 'error'
    
            ); 
    
            return redirect()->route('all.banner')->with($notification);
        }
        else
        {
            if ($request->file('home_one')) {

                $image1      = $request->file('home_one');
    
                $name_gen1   = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
    
                Image::make($image1)->resize(725,100)->save('upload/banner/'.$name_gen1);
    
                $save_url1 = 'upload/banner/'.$name_gen1;
                $banner->home_one = $save_url1;  
            }
            
            if($request->file('home_two')){
    
                $image2      = $request->file('home_two');
    
                $name_gen2   = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
    
                Image::make($image2)->resize(725,100)->save('upload/banner/'.$name_gen2);
    
                $save_url2 = 'upload/banner/'.$name_gen2;
    
                $banner->home_two = $save_url2;
    
            } 
            
            if($request->file('home_three')){
    
                $image3      = $request->file('home_three');
    
                $name_gen3   = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
    
                Image::make($image3)->resize(725,100)->save('upload/banner/'.$name_gen3);
    
                $save_url3 = 'upload/banner/'.$name_gen3;
                
                $banner->home_three = $save_url3;
    
    
            } 
            
            if($request->file('home_four')){
    
                $image4      = $request->file('home_four');
    
                $name_gen4   = hexdec(uniqid()).'.'.$image4->getClientOriginalExtension();
    
                Image::make($image4)->resize(725,100)->save('upload/banner/'.$name_gen4);
    
                $save_url4 = 'upload/banner/'.$name_gen4;
    
                $banner->home_four = $save_url4;
                
    
            }
            
            if($request->file('news_category_one')){
    
                $image5      = $request->file('news_category_one');
    
                $name_gen5   = hexdec(uniqid()).'.'.$image5->getClientOriginalExtension();
    
                Image::make($image5)->resize(725,100)->save('upload/banner/'.$name_gen5);
    
                $save_url5 = 'upload/banner/'.$name_gen5;
    
                $banner->news_category_one = $save_url5;
    
            } 
            if($request->file('news_details_one')){
    
                $image6      = $request->file('news_details_one');
    
                $name_gen6   = hexdec(uniqid()).'.'.$image6->getClientOriginalExtension();
    
                Image::make($image6)->resize(725,100)->save('upload/banner/'.$name_gen6);
    
                $save_url6 = 'upload/banner/'.$name_gen6;
    
                $banner->news_details_one = $save_url6;
               
            }
            $banner->save();
    
            $notification = array(
    
                'message' => 'News Banners Created Successfuly',
    
                'alert-type' => 'success'
    
            ); 
    
            return redirect()->route('all.banner')->with($notification);
    
        }
        
    }

    public function EditBanner($id){

        $banner =  Banners ::findOrFail($id);

        return view('backend.banner.edit_banner',compact('banner'));

    }

    public function UpdateBanner(BannerFormRequest $request ,$id){

      
        if ($request->file('home_one')) {

            $image1      = $request->file('home_one');

            $name_gen1   = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();            

            Image::make($image1)->resize(725,100)->save('upload/banner/'.$name_gen1);

            $save_url1 = 'upload/banner/'.$name_gen1;

            Banners::findOrFail($id)->update([

                'home_one' => $save_url1,
            ]);

        } 
        if($request->file('home_two')){

            $image2      = $request->file('home_two');

            $name_gen2   = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
          
            Image::make($image2)->resize(725,100)->save('upload/banner/'.$name_gen2);

            $save_url2 = 'upload/banner/'.$name_gen2;

            Banners::findOrFail($id)->update([

                'home_two' => $save_url2,
            ]);
        } 
        
        if($request->file('home_three')){

            $image3      = $request->file('home_three');

            $name_gen3   = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();

            Image::make($image3)->resize(725,100)->save('upload/banner/'.$name_gen3);

            $save_url3 = 'upload/banner/'.$name_gen3;

            Banners::findOrFail($id)->update([

                'home_three' => $save_url3,

            ]);
        } 
        if($request->file('home_four')){

            $image4      = $request->file('home_four');

            $name_gen4   = hexdec(uniqid()).'.'.$image4->getClientOriginalExtension();         

            Image::make($image4)->resize(725,100)->save('upload/banner/'.$name_gen4);

            $save_url4 = 'upload/banner/'.$name_gen4;

            Banners::findOrFail($id)->update([

                'home_four' => $save_url4,
            ]);
           
        } 
        if($request->file('news_category_one')){

            $image5      = $request->file('news_category_one');

            $name_gen5   = hexdec(uniqid()).'.'.$image5->getClientOriginalExtension();

            Image::make($image5)->resize(725,100)->save('upload/banner/'.$name_gen5);

            $save_url5 = 'upload/banner/'.$name_gen5;

            Banners::findOrFail($id)->update([

                'news_category_one' => $save_url5,
            ]);

        }  

        if($request->file('news_details_one')){

            $image6      = $request->file('news_details_one');

            $name_gen6   = hexdec(uniqid()).'.'.$image6->getClientOriginalExtension();

            Image::make($image6)->resize(725,100)->save('upload/banner/'.$name_gen6);

            $save_url6 = 'upload/banner/'.$name_gen6;

            Banners::findOrFail($id)->update([

                'news_details_one' => $save_url6,
            ]);

        }

       
      

        

        $notification = array(

            'message' => 'Banners Updated Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.banner')->with($notification);
    }


    public function DeleteBanner($id){
        
        $banner=Banners::find($id);


      

        if(File::exists($banner->home_one )) {
            File::delete($banner->home_one);
        }

        if(File::exists($banner->home_two)) {
            File::delete($banner->home_two);
        }

        if(File::exists($banner->home_three)) {
            File::delete($banner->home_three);
        }

        if(File::exists($banner->home_four)) {
            File::delete($banner->home_four);
        }

        if(File::exists($banner->news_category_one )) {
            File::delete($banner->news_category_one);
        }

        if(File::exists($banner->news_details_one )) {
            File::delete($banner->news_details_one);
        }
        
        $banner->delete();

        $notification = array(

            'message' => 'Banners Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->route('all.banner')->with($notification);
    }


    public function DeleteBannerImage($bid,$id){

        $banner =Banners::findOrFail($bid);
        if($id==1)
        {
            if(File::exists($banner->home_one )) {
                File::delete($banner->home_one);
            }

            $banner->home_one=null;
            
        }

        if($id==2)
        {
            if(File::exists($banner->home_two)) {
                File::delete($banner->home_two);
            }

            $banner->home_two=null;
           
        }

        if($id==3)
        {
            if(File::exists($banner->home_three )) {
                File::delete($banner->home_three);
            }

            $banner->home_three=null;
           
        }

        if($id==4)
        {
            if(File::exists($banner->home_four )) {
                File::delete($banner->home_four);
            }

            $banner->home_four=null;
   
        }


        if($id==5)
        {
            if(File::exists($banner->home_five )) {
                File::delete($banner->home_five);
            }

            $banner->home_five=null;
           
        }


        if($id==6)
        {
            if(File::exists($banner->home_six )) {
                File::delete($banner->home_six);
            }

            $banner->home_six=null;
            
        }

        $banner->save();

        $notification = array(

            'message' => 'Banner Image Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);
    }



}
