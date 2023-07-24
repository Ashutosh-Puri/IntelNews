@extends('frontend.home_dashboard')
@section('home')
@section('title') 
    Home 
@endsection
<div class="main-section" style="overflow: hidden;">
    <section class="themesBazar_section_one">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">
                                        @forelse ($news_slider as $slider)
                                            <div class="owl-item" style="width: 506.25px; margin-right: 20px;">
                                                <div class="secOne_newsContent">
                                                    <div class="sec-one-image">
                                                        <a href="{{ url('news/details/'.$slider->id.'/'.$slider->news_title_slug) }}">
                                                            <img class="lazyload" src="{{ asset($slider->image) }}">
                                                        </a>
                                                        <h6 class="sec-small-cat">
                                                            <a href="{{ url('news/details/'.$slider->id.'/'.$slider->news_title_slug) }}">
                                                                {{ $slider->created_at->format('M d Y') }}
                                                            </a>
                                                        </h6>
                                                        <h1 class="sec-one-title">
                                                            <a href="{{ url('news/details/'.$slider->id.'/'.$slider->news_title_slug) }}"> {{ $slider->news_title }}</a>
                                                        </h1>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty 
                                        @endforelse
                                    </div>
                                </div>
                                <div class="owl-nav">
                                    <button type="button" role="presentation" class="owl-prev"><i class="fa-solid fa-angle-left"></i></button>
                                    <button type="button" role="presentation" class="owl-next"><i class="fa-solid fa-angle-right"></i></button>
                                </div>
                                <div class="owl-dots">
                                    <span  class="owl-dot"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5">
                            @forelse ($section_three as $three)
                            <div class="secOne-smallItem">
                                <div class="secOne-smallImg">
                                    <a href="{{ url('news/details/'.$three->id.'/'.$three->news_title_slug) }}"><img class="lazyload" src="{{ asset($three->image) }}"></a>
                                    <h5 class="secOne_smallTitle">
                                        <a href="{{ url('news/details/'.$three->id.'/'.$three->news_title_slug) }}">{{ $three->news_title }} </a>
                                    </h5>
                                </div>
                            </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                    <div class="sec-one-item2">
                        <div class="row">
                            @forelse ($section_nine as $nine)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="sec-one-wrpp2">
                                        <div class="secOne-news">
                                            <div class="secOne-image2">
                                                <a href="{{ url('news/details/'.$nine->id.'/'.$nine->news_title_slug) }} "><img class="lazyload" src="{{ asset($nine->image) }}"></a>
                                            </div>
                                            <h4 class="secOne-title2">
                                                <a href="{{ url('news/details/'.$nine->id.'/'.$nine->news_title_slug) }} ">{{ $nine->news_title }} </a>
                                            </h4>
                                        </div>
                                        <div class="cat-meta">
                                            <a href="{{ url('news/details/'.$nine->id.'/'.$nine->news_title_slug) }}"> <i class="lar la-newspaper"></i> {{ $nine->created_at->format('M d Y') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4" id="livetv">
                    <div class="live-item">
                        <div class="live_title">
                            <div class="themesBazar"></div>
                            <a href="#">LIVE TV </a>
                        </div>
                        <div class="popup-wrpp">
                            @if (isset($live_tv))
                                <div class="live_image">
                                    <img width="700" height="400" src="{{ asset($live_tv->live_image) }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy">
                                    <div data-mfp-src="#mymodal" class="live-icon modal-live">
                                         <i class="las la-play"></i>
                                    </div>
                                </div>
                                <div class="live-popup">
                                    <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles" aria-describedby="modal-contents">
                                        <div id="modal-contents">
                                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                                <iframe width="560" height="315" src="{{ $live_tv->live_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="themesBazar_widget">
                            <h3 style="margin-top:5px"> Breaking News </h3>
                        </div>
                        <div class="archiveTab-sibearNews">
                            @foreach ($breakingnews as $key => $newsitem)
                                <div class="archive-tabWrpp archiveTab-border">
                                    <div class="archiveTab-image ">
                                        <a href=" {{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }}"><img class="lazyload" src="{{ asset($newsitem->image) }}"></a>
                                    </div>
                                    <h4 class="archiveTab_hadding">
                                        <a href="{{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }} ">{{ $newsitem->news_title }}</a>
                                    </h4>
                                    <div class="archive-conut">
                                        {{ $key+1 }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> 
                    <div class="sitebar-fixd" style="position: sticky; top: 0;">
                        <div class="themesBazar_widget">
                            <h3 style="margin-top:5px"> LATEST NEWS </h3>
                        </div>
                        <div class="singlePopular">
                            <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent" aria-selected="true"> 
                                        LATEST 
                                    </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular" role="tab" aria-controls="archivePopulars" aria-selected="false"> 
                                        POPULAR
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContentarchive">                          
                            <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel" aria-labelledby="archiveRecent">  
                                <div class="archiveTab-sibearNews">
                                    @foreach ($newnewspost as $key => $newsitem)
                                        <div class="archive-tabWrpp archiveTab-border">
                                            <div class="archiveTab-image ">
                                                <a href=" {{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }}"><img class="lazyload" src="{{ asset($newsitem->image) }}"></a>
                                            </div>
                                            <h4 class="archiveTab_hadding">
                                                <a href="{{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }} ">{{ $newsitem->news_title }}</a>
                                            </h4>
                                            <div class="archive-conut">       
                                                {{ $key+1 }}       
                                            </div>       
                                        </div>       
                                    @endforeach      
                                </div>      
                            </div>
                            <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel" aria-labelledby="archivePopulars">
                                <div class="archiveTab-sibearNews">
                                    @foreach ($newspopular as $key => $newsitem)
                                        <div class="archive-tabWrpp archiveTab-border">      
                                            <div class="archiveTab-image ">
                                                <a href=" {{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }}"><img class="lazyload" src="{{ asset($newsitem->image) }}"></a>
                                            </div>
                                            <h4 class="archiveTab_hadding">
                                                <a href="{{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }} ">{{ $newsitem->news_title }}</a>
                                            </h4>
                                            <div class="archive-conut">
                                                {{ $key+1 }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="themesBazar_widget">
                            <h3 style="margin-top:5px"> OLD NEWS </h3>
                        </div>
                        <form class="wordpress-date" action="{{ route('search-by-date') }}" method="post">
                            @csrf
                            <div class="row m-0 p-0">
                                <div class="col-8 p-0 ">
                                    <input type="date"   name="date" class="form-control w-100 @error('date') is-invalid @enderror">
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4 p-0">
                                     <input class="form-control-sm w-100" type="submit" value="Search" style="height: 38px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @if (isset($banner->home_one))
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p>
                                <img loading="lazy" class="aligncenter size-full wp-image-74" src="{{ asset($banner->home_one) }}" alt="banner home_one" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            @else
            @endif
            @if (isset($banner->home_two))
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p>
                                <img loading="lazy" class="aligncenter size-full wp-image-74" src="{{ asset($banner->home_two) }}" alt="banner home_two" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            @else
            @endif
        </div>
    </div>
    <section class="section-two">
        <div class="container">
            <div class="secTwo-color">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="themesBazar_cat6">
                            <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" id="all" data-bs-toggle="pill"  data-bs-target="#Info-tabs1" role="tab" aria-controls="Info-tabs1" aria-selected="true">
                                        ALL
                                    </div>
                                </li>
                                @foreach($categories as $category)
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" id="categori-tab2" data-bs-toggle="pill" data-bs-target="#category{{ $category->id }}" role="tab" aria-controls="Info-tabs2" aria-selected="false">
                                            {{ $category->category_name }} 
                                        </div>
                                    </li>
                                @endforeach
                                <span class="themeBazar6"></span>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="Info-tabs1" role="tabpanel" aria-labelledby="categori-tab1 ">
                                <div class="row">
                                    @foreach($news as $item)
                                        <div class="themesBazar-4 themesBazar-m2">
                                            <div class="sec-two-wrpp">
                                                <div class="section-two-image">
                                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                                        <img class="lazyload"src="{{ asset($item->image) }}">
                                                    </a>
                                                </div>
                                                <h5 class="sec-two-title">
                                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }} </a>
                                                </h5>
                                            </div>
                                        </div>
                                    @endforeach
                                    {{ $news->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                            @foreach($categories as $category)
                                <div class="tab-pane fade" id="category{{$category->id}}" role="tabpanel" aria-labelledby="categori-tab2">
                                    <div class="row">
                                        @php
                                            $catwiseNews = App\Models\NewsPost::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                        @endphp
                                        @forelse($catwiseNews as $item)
                                            <div class="themesBazar-4 themesBazar-m2">
                                                <div class="sec-two-wrpp">
                                                    <div class="section-two-image">
                                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                            <img class="lazyload" src="{{ $item->image }}">
                                                        </a>
                                                    </div>
                                                    <h5 class="sec-two-title">
                                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }} </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            @if (isset($banner->home_three))
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p>
                                <img loading="lazy" class="aligncenter size-full wp-image-74"  src="{{ asset($banner->home_three) }}" alt="banner home_three" width="100%"  height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            @else
            @endif
            @if (isset($banner->home_four))
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p>
                                <img loading="lazy" class="aligncenter size-full wp-image-74"  src="{{ asset($banner->home_four) }}" alt="banner home_four" width="100%"  height="auto">
                            </p>
                        </div>
                    </div>
                </div>
             @else
            @endif
        </div>
    </div>
    @if(isset($skip_news_0[0]) || isset($skip_news_1[0]))
        <section class="section-three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        @if (isset($skip_cat_0))
                            <h2 class="themesBazar_cat07"> 
                                <a href="{{ url('news/category/'.$skip_cat_0->id.'/'.$skip_cat_0->category_slug) }}"> 
                                    <i class="las la-align-justify"></i>  {{ $skip_cat_0->category_name }} 
                                </a> 
                            </h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    @foreach ($skip_news_0 as $item)
                                        @if($loop->index < 1)
                                            <div class="secThree-bg">
                                                <div class="sec-theee-image">
                                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                                        <img class="lazyload" src="{{ asset($item->image) }}">
                                                    </a>
                                                </div>
                                                <h4 class="secThree-title">
                                                    <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }} </a>
                                                </h4>

                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="bg2">
                                        @foreach ($skip_news_0 as $item)
                                            @if($loop->index > 0)
                                                <div class="secThree-smallItem">
                                                    <div class="secThree-smallImg">
                                                        <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                            <img class="lazyload" src="{{ asset($item->image) }}">
                                                        </a>
                                                        <h5 class="secOne_smallTitle">
                                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">{{ $item->news_title }} </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-4">
                        @if (isset($skip_cat_1))
                            <h2 class="themesBazar_cat08"> 
                                <a href="{{ url('news/category/'.$skip_cat_1->id.'/'.$skip_cat_1->category_slug) }}"> 
                                    <i class="las la-align-justify"></i>  {{ $skip_cat_1->category_name }} 
                                </a> 
                            </h2>
                            <div class="map-area" style="width:100%; background: #eff3f4;">
                                <div style="padding: 48px 35px ;" class="shadow">
                                    @foreach ($skip_news_1 as $item)
                                        <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                            <img class="lazyload" src="{{ asset($item->image) }}">
                                        </a>     
                                    @break           
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
        </section>
    @endif
    @if(isset($skip_news_2[0]))
        <section class="section-four">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @if (isset($skip_cat_2))
                            <h2 class="themesBazar_cat04">
                                <a href="{{ url('news/category/'.$skip_cat_2->id.'/'.$skip_cat_2->category_slug) }}"> 
                                    <i class="las la-align-justify"></i> {{ $skip_cat_2->category_name }} 
                                </a> 
                            </h2>
                            <div class="secFour-slider owl-carousel owl-loaded owl-drag">
                                <div class="owl-stage-outer">
                                    <div class="owl-stage" style="transform: translate3d(-3294px, 0px, 0px); transition: all 1s ease 0s; width: 4792px;">
                                        @foreach ($skip_news_2 as $item)
                                            <div class="owl-item" style="width: 289.5px; margin-right: 10px;">
                                                <div class="secFour-wrpp ">
                                                    <div class="secFour-image">
                                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                            <img class="lazyload" src="{{ asset($item->image) }}">
                                                        </a>
                                                        <h5 class="secFour-title">
                                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="owl-nav disabled">
                                    <button type="button" role="presentation" class="owl-prev">
                                        <i class="las la-angle-left"></i>
                                    </button>
                                    <button type="button" role="presentation" class="owl-next">
                                        <i class="las la-angle-right"></i>
                                    </button>
                                </div>
                                <div class="owl-dots">
                                    <span  class="owl-dot"></span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if (isset($skip_news_3[0]))
        <section class="section-seven">
            <div class="container">
                <h2 class="themesBazar_cat04">
                    <a href="{{ url('news/category/'.$skip_cat_3->id.'/'.$skip_cat_3->category_slug) }}"> 
                        <i class="las la-align-justify"> </i> {{ $skip_cat_3->category_name }} 
                    </a> 
                    <span class="float-end"> 
                        <a href="{{ url('news/category/'.$skip_cat_3->id.'/'.$skip_cat_3->category_slug) }}">
                            More  <i class="las la-arrow-circle-right"></i> 
                        </a>
                    </span>
                </h2>
                <div class="secSecven-color">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="black-bg">
                                <div class="secSeven-image">
                                  
                                    <a href="{{ url('news/details/'.$skip_news_3[0]->id.'/'.$skip_news_3[0]->news_title_slug) }}"><img class="lazyload" src="{{ asset($skip_news_3[0]->image) }}"></a>
                                    
                                </div>
                                <h6 class="secSeven-title">
                                    <a href="{{ url('news/details/'.$skip_news_3[0]->id.'/'.$skip_news_3[0]->news_title_slug) }}">{{ $skip_news_3[0]->news_title }} </a>
                                </h6>
                                <div class="secSeven-details">
                                    {!! $skip_news_3[0]->news_details !!}
                                    <br>
                                    <a href="{{ url('news/details/'.$skip_news_3[0]->id.'/'.$skip_news_3[0]->news_title_slug) }}">
                                         More..
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="row">
                                @foreach ($skip_news_3 as $key => $item )
                                    @if ($key==0)
                                        @continue
                                    @endif
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="secSeven-wrpp ">
                                            <div class="secSeven-image2">
                                                <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                    <img class="lazyload" src="{{ asset($item->image) }}">
                                                </a>
                                                <h5 class="secSeven-title2">
                                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                        {{ $item->news_title }}
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($key==4)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    @endif
    @if (isset($skip_news_4[0]) || isset($skip_news_5[0]) ||isset($skip_news_6[0]))
        <section class="section-five">
            <div class="container">
                <div class="row">
                    @if(isset($skip_news_4[0]))
                        <div class="col-lg-4 col-md-4">
                            <h2 class="themesBazar_cat04"> 
                                <a href="{{ url('news/category/'.$skip_cat_4->id.'/'.$skip_cat_4->category_slug) }}"> 
                                    <i class="las la-align-justify"> </i> {{ $skip_cat_4->category_name }} 
                                </a> 
                            </h2>
                            <div class="white-bg">
                                <div class="secFive-image">
                                    <a href="{{ url('news/details/'.$skip_news_4[0]->id.'/'.$skip_news_4[0]->news_title_slug) }}">
                                        <img class="lazyload" src="{{ asset($skip_news_4[0]->image) }}"></a>
                                    <div class="secFive-title">
                                        <a href="{{ url('news/details/'.$skip_news_4[0]->id.'/'.$skip_news_4[0]->news_title_slug) }} ">
                                            {{ $skip_news_4[0]->news_title }}
                                        </a>
                                    </div>
                                </div>
                                @foreach ($skip_news_4 as $key => $item)
                                    @if($key==0)
                                        @continue
                                    @endif
                                    <div class="secFive-smallItem">
                                        <div class="secFive-smallImg">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                <img class="lazyload" src="{{ asset($item->image) }}">
                                            </a>
                                            <h5 class="secFive_title2">
                                                <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                    {{ $item->news_title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                    @if($key==3)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(isset($skip_news_5[0]))
                        <div class="col-lg-4 col-md-4">
                            <h2 class="themesBazar_cat04"> 
                                <a href="{{ url('news/category/'.$skip_cat_5->id.'/'.$skip_cat_5->category_slug) }}"> 
                                    <i class="las la-align-justify"> </i> {{ $skip_cat_5->category_name }} 
                                </a> 
                            </h2>
                            <div class="white-bg">
                                <div class="secFive-image">
                                    <a href="{{ url('news/details/'.$skip_news_5[0]->id.'/'.$skip_news_5[0]->news_title_slug) }}">
                                        <img class="lazyload" src="{{ asset($skip_news_5[0]->image) }}"></a>
                                    <div class="secFive-title">
                                        <a href="{{ url('news/details/'.$skip_news_5[0]->id.'/'.$skip_news_5[0]->news_title_slug) }} ">
                                            {{ $skip_news_5[0]->news_title }}
                                        </a>
                                    </div>
                                </div>
                                @foreach ($skip_news_5 as $key => $item)
                                    @if($key==0)
                                        @continue
                                    @endif
                                    <div class="secFive-smallItem">
                                        <div class="secFive-smallImg">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                <img class="lazyload" src="{{ asset($item->image) }}">
                                            </a>
                                            <h5 class="secFive_title2">
                                                <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                    {{ $item->news_title }}
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                    @if($key==3)
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if(isset($skip_news_6[0]))
                    <div class="col-lg-4 col-md-4">
                        <h2 class="themesBazar_cat04"> 
                            <a href="{{ url('news/category/'.$skip_cat_6->id.'/'.$skip_cat_6->category_slug) }}"> 
                                <i class="las la-align-justify"> </i> {{ $skip_cat_6->category_name }} 
                            </a> 
                        </h2>
                        <div class="white-bg">
                            <div class="secFive-image">
                                <a href="{{ url('news/details/'.$skip_news_6[0]->id.'/'.$skip_news_6[0]->news_title_slug) }}">
                                    <img class="lazyload" src="{{ asset($skip_news_6[0]->image) }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/'.$skip_news_6[0]->id.'/'.$skip_news_6[0]->news_title_slug) }} ">
                                        {{ $skip_news_6[0]->news_title }}
                                    </a>
                                </div>
                            </div>
                            @foreach ($skip_news_6 as $key => $item)
                                @if($key==0)
                                    @continue
                                @endif
                                <div class="secFive-smallItem">
                                    <div class="secFive-smallImg">
                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                            <img class="lazyload" src="{{ asset($item->image) }}">
                                        </a>
                                        <h5 class="secFive_title2">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                {{ $item->news_title }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                                @if($key==3)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif                
                    

                    
                </div>
            </div>
        </section> 
    @endif
    <section class="section-ten" id="photogallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <h2 class="themesBazar_cat01">
                         <a href=" "> 
                            <i class="las la-camera"></i> PHOTO GALLERY 
                        </a>
                    </h2>
                    <div class="homeGallery owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage" style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">
                                @foreach ($photo_gallery as $item)
                                    <div class="owl-item" style="width: 784px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="photo">
                                                <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                    <img src="{{ asset($item->photo_gallery) }}"></a>
                                                <h3 class="photoCaption">
                                                    <a href=" ">{{ $item->post_date }} </a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav">
                            <button type="button" role="presentation"  class="owl-prev">
                                <i class="las la-angle-left"></i>
                            </button>
                            <button   type="button" role="presentation" class="owl-next disabled">
                                <i class="las la-angle-right"></i>
                            </button>
                        </div>
                        <div class="owl-dots disabled"></div>
                    </div>
                    <div class="homeGallery1 owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"  style="transition: all 1s ease 0s; width: 2515px; transform: translate3d(-463px, 0px, 0px);">
                                @foreach ($photo_gallery as $item)
                                    <div class="owl-item cloned" style="width: 122.333px; margin-right: 10px;">
                                        <div class="item">
                                            <div class="phtot2">
                                                <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                    <img src="{{ asset($item->photo_gallery) }}" alt="PHOTO"></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="owl-nav disabled">
                            <button type="button" role="presentation" class="owl-prev">
                                <span aria-label="Previous">‹</span>
                            </button>
                            <button type="button" role="presentation" class="owl-next">
                                <span aria-label="Next">›</span>
                            </button>
                        </div>
                        <div class="owl-dots">
                            <span  class="owl-dot"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4" id="videogallery">
                    <h2 class="themesBazar_cat01">
                        <a href=" "> 
                            <i class="las la-video"></i>  VIDEO GALLERY 
                        </a>
                    </h2>
                    <div class="white-bg">
                        @foreach ($video as $item)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <img src="{{ asset($item->video_image) }}">
                                    <a href="{{ $item->video_url }}"  class="home-video-icon popup">
                                        <i class="las la-video"></i>
                                    </a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ $item->video_url }}" class="popup">
                                            {{ $item->video_title }} 
                                        </a>
                                    </h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> 
        {{-- <section class="section-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> BIZ-ECON </a> <span> <a
                                href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                    </h2>

                    <div class="white-bg">
                        <div class="secFive-image">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <div class="secFive-title">
                                <a href=" ">Recovering money from selling rights</a>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Recovering money from selling rights</a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Recovering money from selling rights</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> INTERNATIONAL </a> <span> <a
                                href=" ">More <i class="las la-arrow-circle-right"></i> </a></span>
                    </h2>

                    <div class="white-bg">
                        <div class="secFive-image">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <div class="secFive-title">
                                <a href=" ">How important are box office numbers</a>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">How important are box office numbers</a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">How important are box office numbers</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> SPORTS </a> <span> <a
                                href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                    </h2>

                    <div class="white-bg">
                        <div class="secFive-image">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <div class="secFive-title">
                                <a href=" ">Britney Spears says "I don't believe in God anymore" </a>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Britney Spears says "I don't believe in God anymore"
                                    </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Britney Spears says "I don't believe in God anymore"
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="section-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> EDUCATION </a> <span> <a
                                href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                    </h2>

                    <div class="white-bg">
                        <div class="secFive-image">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <div class="secFive-title">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> SCI-TECH </a> <span> <a
                                href=" "> More <i class="las la-arrow-circle-right"></i> </a></span>
                    </h2>

                    <div class="white-bg">
                        <div class="secFive-image">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <div class="secFive-title">
                                <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Nora Fatehi questioned in Rs 200cr extortion case </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <h2 class="themesBazar_cat01"> <a href=" "> SCI-TECH </a> <span> <a
                                href=" ">More <i class="las la-arrow-circle-right"></i> </a></span>
                    </h2>

                    <div class="white-bg">
                        <div class="secFive-image">
                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                            <div class="secFive-title">
                                <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                                </h5>
                            </div>
                        </div>
                        <div class="secFive-smallItem">
                            <div class="secFive-smallImg">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <h5 class="secFive_title2">
                                    <a href=" ">Gazi Mazharul Anwar buried in mother's grave </a>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>  --}}
</div>

@endsection
