@extends('frontend.home_dashboard')
@section('title')
    News Details
@endsection
@section('home')
    <section class="single-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="single-cat-info">
                        <div class="single-home">
                            <i class="la la-home"> </i>
                            <a href=" {{ url('/') }}"> 
                                HOME 
                            </a>
                        </div>
                        <div class="single-cats">
                            <i class="la la-bars"></i> 
                            <a href="{{ url('news/category/'.$news->categoryRelation->id.'/'.$news->categoryRelation->category_slug) }}" rel="category tag">
                                {{ $news->categoryRelation->category_name }}
                            </a>
                            @if (!$news->subcategory_id == NULL)
                              ->  <a href=" " rel="category tag">{{ $news->subcategoryRelation->subcategory_name }}</a>
                            @endif
                        </div>
                    </div>
                    <h1 class="single-page-title bg-info p-2">
                        {{$news->news_title }}
                    </h1>
                    <div class="row g-2 bg-dark">
                        <div class="col-lg-1 col-md-2 ">
                            <div class="reportar-image">
                                <img src="{{ (!empty($news->userRelation->photo)) ? asset($news->userRelation->photo) : asset('upload/no_image.jpg') }}">
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-10   text-white">
                            <div class="reportar-title">
                                Posted By 
                                <a class="btn btn-sm btn-warning py-0" href="{{ route('reporter.all.news',$news->user_id) }}"> 
                                    {{ $news['userRelation']['name'] }} 
                                </a>
                            </div>
                            <div class="viwe-count text-white">
                                <ul >
                                    <li class="text-white">
                                        <span class="btn-sm btn btn-success  py-0"> 
                                            <i class="la la-clock-o "></i> 
                                            Created {{ $news->created_at->format('M d Y') }}
                                        </span>                    
                                    </li>
                                    <li class="text-white"> 
                                        <span class="btn-sm btn btn-primary  py-0 ">
                                             <i class="la la-eye"></i> 
                                             {{ $news->view_count }} &nbsp; Read
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-image">
                        <a href="{{ url('news/details/'.$news->id.'/'.$news->news_title_slug) }}">
                            <img class="lazyload" src="{{ asset($news->image) }}">
                        </a>
                        <h2 class="single-caption2">
                            {{ $news->news_title }}
                        </h2>
                    </div>
                    <button class="btn btn-danger btn-md p-2 m-2" id="inc">
                        <i class="fas fa-font"></i><i class="fas fa-long-arrow-alt-up"></i>
                    </button>
                    <button class="btn btn-danger btn-md p-2 m-2" id="dec">
                         <i class="fas fa-font"></i><i class="fas fa-long-arrow-alt-down"></i>
                    </button>
                    <news-font>
                        <div class="single-details">
                            {!! $news->news_details !!}
                        </div>
                    </news-font>
                    <div class="singlePage2-tag">
                        <span> Tags : </span>
                        @foreach ($tags_all as $tag)
                            <a href=" " rel="tag">{{ ucwords($tag) }}</a>
                        @endforeach
                    </div>
                    <h3 class="single-social-title">
                        Share News 
                    </h3>
                    <div class="single-page-social">
                        <a href=" " target="_blank" title="Facebook"><i class="lab la-facebook-f"></i></a>
                        <a ref=" " target="_blank"><i class="lab la-twitter"></i></a>
                        <a href=" "target="_blank"><i class="lab la-linkedin-in"></i></a>
                        <a class="btn btn-danger" onclick="printFunction()" target="_blank"><i class="las la-print"></i>
                            <script>
                                function printFunction() {
                                    window.print();
                                }
                            </script>
                        </a>
                    </div>
                    @foreach ($review as $item)
                        @if ($item->status != 0)
                            <div class="author2">
                                <div class="author-content2">
                                    <h6 class="author-caption2">
                                        <span> COMMENTS </span>
                                    </h6>
                                    <div class="author-image2">
                                        <img alt="" src="{{ (!empty($item->UserRelation->photo)) ? asset($item->UserRelation->photo) : asset('upload/no_image.jpg') }}" class="avatar avatar-96 photo" height="96" width="96" loading="lazy">
                                    </div>
                                    <div class="authorContent">
                                        <h1 class="author-name2">
                                            <a href="{{ route('reporter.all.news',$news->user_id) }}"> 
                                                {{ $item->UserRelation->name  }} 
                                            </a>
                                        </h1>
                                        <p> 
                                            {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} 
                                        </p>
                                        <div class="author-details">
                                            {{ $item->comment }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <hr>
                    @guest
                        <p>
                            <b>You Need To Login First <a class="btn btn-sm btn-warning" href="{{ route('login') }}"> Login</a> </b>
                        </p>
                    @else
                        <form action="{{ route('store.review') }}" method="post" class="wpcf7-form init" enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success p-2 m-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger p-2 m-2" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div style="display: none;"></div>
                            <div class="main_section">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-title">
                                            Comments *
                                        </div>
                                        <div class="contact-form">
                                            <input type="hidden" name="news_id" value="{{ $news->id }}">
                                            <span class="wpcf7-form-control-wrap news_details">
                                                <textarea name="comment" cols="20" rows="5" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true"  placeholder="Write Comment....">
                                                </textarea>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-btn">
                                        <input type="submit" value="Submit Comments" class="wpcf7-form-control has-spinner wpcf7-submit">
                                        <span class="wpcf7-spinner"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    @endguest
                    <div class="single_relatedCat">
                        <a href="{{ url('news/category/'.$news->categoryRelation->id.'/'.$news->categoryRelation->category_slug) }}">Related News </a>
                    </div>
                    <div class="row">
                        @foreach ($relatedNews as $item )
                            <div class="themesBazar-3 themesBazar-m2">
                                <div class="related-wrpp">
                                    <div class="related-image">
                                        <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                            <img class="lazyload" src="{{ asset($item->image) }}">
                                        </a>
                                    </div>
                                    <h4 class="related-title">
                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                            {{ $item->news_title }} 
                                        </a>
                                    </h4>
                                    <div class="related-meta">
                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                            <i class="la la-tags"> </i>
                                            {{ $news->created_at->format('M d Y') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                    <div class="sitebar-fixd" >
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
                    <div >
                        <div class="themesBazar_widget">
                            <h3 style="margin-top:5px"> OLD NEWS </h3>
                        </div>
                        <form class="wordpress-date" action="{{ route('search-by-date') }}" method="post">
                            @csrf
                            <div class="row m-0 p-0">
                                <div class="col-8 p-0 ">
                                    <input type="date"   name="date" class="form-control w-100 @error('date') is-invalid @enderror"/>
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-4 p-0">
                                     <input class="form-control-sm w-100" type="submit" value="Search" style="height: 38px;"/>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var size = 16;
        function setFontSize(s){
            size = s;
            $('news-font').css('font-size','' + size + 'px');
        }
        function increaseFontSize(){
            setFontSize(size + 5);
        }
        function decreaseFontSize(){
            if (size > 5) {
                setFontSize(size - 5);
            }
        }
        $('#inc').click(increaseFontSize);
        $('#dec').click(decreaseFontSize);
        setFontSize(size);
    </script>
@endsection
