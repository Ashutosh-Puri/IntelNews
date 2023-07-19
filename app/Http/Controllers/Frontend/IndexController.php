<?php

namespace App\Http\Controllers\Frontend;

use Image;
use DateTime;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Banners;
use App\Models\LiveTvs;
use App\Models\Category;
use App\Models\NewsPost;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\PhotoGalleries;
use App\Models\VideoGalleries;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller{

    public function Index(){

        $skip_cat_0 = Category::skip(0)->first();

        if(isset($skip_cat_0))
        {
            $skip_news_0 = NewsPost::where('status',1)->where('category_id',$skip_cat_0->id)->orderBy('id','DESC')->limit(5)->get();
        }
        else
        {
            $skip_cat_0 = $skip_news_0=null;
        }

        $skip_cat_1 = Category::skip(1)->first();
        
        if (isset($skip_cat_1)) 
        {
            $skip_news_1 = NewsPost::where('status',1)->where('category_id',$skip_cat_1->id)->orderBy('id','DESC')->limit(6)->get();
        } 
        else 
        {
            $skip_cat_1=   $skip_news_1=null;
        }

        $skip_cat_2 = Category::skip(2)->first();
        if (isset($skip_cat_2) )
        {
                $skip_news_2 = NewsPost::where('status',1)->where('category_id',$skip_cat_2->id)->orderBy('id','DESC')->limit(6)->get();
        } 
        else 
        {
            $skip_cat_2=  $skip_news_2=null;
        }
        $skip_cat_3 = Category::skip(3)->first();
        if (isset($skip_cat_3) )
        {
                $skip_news_3 = NewsPost::where('status',1)->where('category_id',$skip_cat_3->id)->orderBy('id','DESC')->limit(6)->get();
        } 
        else 
        {
            $skip_cat_3=  $skip_news_3=null;
        }
        $skip_cat_4 = Category::skip(4)->first();
        if (isset($skip_cat_4) )
        {
                $skip_news_4 = NewsPost::where('status',1)->where('category_id',$skip_cat_4->id)->orderBy('id','DESC')->limit(6)->get();
        } 
        else 
        {
            $skip_cat_4=  $skip_news_4=null;
        }
        $skip_cat_5 = Category::skip(5)->first();
        if (isset($skip_cat_5) )
        {
                $skip_news_5 = NewsPost::where('status',1)->where('category_id',$skip_cat_5->id)->orderBy('id','DESC')->limit(6)->get();
        } 
        else 
        {
            $skip_cat_5=  $skip_news_5=null; 
        }
        $skip_cat_6 = Category::skip(6)->first();
        if (isset($skip_cat_6) )
        {
                $skip_news_6 = NewsPost::where('status',1)->where('category_id',$skip_cat_6->id)->orderBy('id','DESC')->limit(6)->get();
        } 
        else 
        {
            $skip_cat_6=  $skip_news_6=null; 
        }
        $banner = Banners::first();
        $live_tv =LiveTvs::first();
        $news_slider = NewsPost::where('status',1)->where('top_slider',1)->limit(3)->get();
        $news =NewsPost::where('status',1)->orderBy('id','ASC')->paginate(8);
        $categories =Category::orderBy('category_name','ASC')->get();
        $section_three = NewsPost::where('status',1)->where('first_section_three',1)->limit(3)->get();
        $section_nine = NewsPost::where('status',1)->where('first_section_nine',1)->limit(9)->get();
        $newnewspost = NewsPost::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $newspopular = NewsPost::where('status',1)->orderBy('view_count','DESC')->limit(3)->get();
        $photo_gallery = PhotoGalleries::latest()->get();
        $video = VideoGalleries::latest()->limit(6)->get();
        $breakingnews =NewsPost::where('status',1)->where('breaking_news',1)->orderBy('id','DESC')->limit(3)->get();
       
        return view('frontend.index',compact('skip_cat_6','skip_news_6','skip_cat_5','skip_news_5','skip_cat_4','skip_news_4','skip_cat_3','skip_news_3','video','photo_gallery','news','categories','banner','section_three','section_nine','news_slider','live_tv','breakingnews','newnewspost','newspopular','skip_cat_0','skip_news_0','skip_cat_2','skip_news_2','skip_cat_1','skip_news_1'));

    }

    public function NewsDetails($id,$slug){

        $live_tv =LiveTvs::first();
        $news = NewsPost::findOrFail($id);

        $tags = $news->tags;

        $tags_all = explode(',' , $tags);

        $cat_id = $news->category_id;

        $relatedNews = NewsPost::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','ASC')->limit(6)->get();

        $newsKey = 'blog' . $news->id;

        if (!Session::has($newsKey)) {

            $news->increment('view_count');

            Session::put($newsKey,1);

        }
        $breakingnews =NewsPost::where('status',1)->where('breaking_news',1)->orderBy('id','DESC')->limit(5)->get();

        $newnewspost = NewsPost::orderBy('id','DESC')->limit(10)->get();

        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(10)->get();

        return view('frontend.news.news_details',compact('live_tv','breakingnews','news','tags_all','relatedNews','newnewspost','newspopular'));

    }

    public function CatWiseNews($id,$slug){
        $live_tv =LiveTvs::first();
        $newnewspost = NewsPost::orderBy('id','DESC')->limit(10)->get();

        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(10)->get();

        $news = NewsPost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->get();

        $newstwo = NewsPost::where('status',1)->where('category_id',$id)->orderBy('id','DESC')->limit(2)->get();
        $breakingnews =NewsPost::where('status',1)->where('breaking_news',1)->orderBy('id','DESC')->limit(5)->get();

        return view('frontend.news.category_news',compact('live_tv','breakingnews','news','newstwo','newnewspost','newspopular'));

    }

    public function SubCatWiseNews($id,$slug){
        $newnewspost = NewsPost::orderBy('id','DESC')->limit(10)->get();
        $live_tv =LiveTvs::first();
        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(10)->get();
        $breakingnews =NewsPost::where('status',1)->where('breaking_news',1)->orderBy('id','DESC')->limit(5)->get();

        $news = NewsPost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->get();

        $newstwo = NewsPost::where('status',1)->where('subcategory_id',$id)->orderBy('id','DESC')->limit(2)->get();

        return view('frontend.news.subcategory_news',compact('live_tv','breakingnews','news','newstwo','newnewspost','newspopular'));

    }

    public function SearchByDate(Request $request){

        $request->validate([

            'date' => ['required'],

        ]);
        $live_tv =LiveTvs::first();
        $newnewspost = NewsPost::orderBy('id','DESC')->limit(10)->get();

        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(10)->get();
        $breakingnews =NewsPost::where('status',1)->where('breaking_news',1)->orderBy('id','DESC')->limit(5)->get();

        $date = new DateTime($request->date);

        $formatDate = $date->format('d-m-Y');

        $news = NewsPost::where('post_date',$formatDate)->latest()->get();

        return view('frontend.news.search_by_date',compact('live_tv','breakingnews','news','formatDate','newnewspost','newspopular'));

    }

    public function SearchNews(Request $request){
       
        $request->validate([

            'search' => ['required'],

        ]);

        $live_tv =LiveTvs::first();
        $newnewspost = NewsPost::orderBy('id','DESC')->limit(10)->get();

        $newspopular = NewsPost::orderBy('view_count','DESC')->limit(10)->get();
        $breakingnews =NewsPost::where('status',1)->where('breaking_news',1)->orderBy('id','DESC')->limit(5)->get();

        $item = $request->search;

        $news = NewsPost::where('news_title','LIKE',"%$item%")->get();

        return view('frontend.news.search',compact('live_tv','breakingnews','newnewspost','newspopular','news','item'));

    }

    public function RepporterAllNews($id){

        $reporter = User::findOrFail($id);

        $news = NewsPost::where('user_id',$id)->get();

        return view('frontend.reporter.reporter_news_post',compact('news','reporter'));

    }

}
