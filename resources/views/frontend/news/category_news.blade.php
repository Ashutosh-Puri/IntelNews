@extends('frontend.home_dashboard')
@section('home')
@section('title')
    Category
@endsection
<div class="archive-page1">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="rachive-info-cats">
                    <a href="{{ url('/') }} "><i class="las la-home"></i> </a>
                    <i class="las la-chevron-right"></i>
                    <a href="{{ url('news/category/'.$news[0]->categoryRelation->id.'/'.$news[0]->categoryRelation->category_slug) }}" rel="category tag">{{ $news[0]->categoryRelation->category_name }}</a>
                </div>
                <div class="row">
                    @foreach ($news as $item)
                        @if ($loop->index < 1)
                            <div class="col-lg-8 col-md-8">
                                <div class="archive-shadow arch_margin">
                                    <div class="archive1_image">
                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                            <img class="lazyload" src="{{ asset($item->image) }}" />
                                        </a>
                                        <div class="archive1-meta">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                                <i class="la la-tags"> </i> {{ $item->created_at->format('l M d Y') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="archive1-padding">
                                        <div class="archive1-title">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                                {{ $item->news_title }}
                                            </a>
                                        </div>
                                        <div class="content-details">
                                            {!! $item->news_details !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            @foreach ($newstwo as $item)
                                @if ($loop->index > 0)
                                    <div class="archive1-custom-col-12">
                                        <div class="archive-item-wrpp2">
                                            <div class="archive-shadow arch_margin">
                                                <div class="archive1_image2">
                                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                                        <img class="lazyload" src="{{ asset($item->image) }}"/>
                                                    </a>
                                                    <div class="archive1-meta">
                                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">
                                                            <i class="la la-tags"> </i> {{ $item->created_at->format('l M d Y') }}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="archive1-padding">
                                                    <div class="archive1-title2">
                                                        <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                            {{ $item->news_title }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($news as $item)
                        @if ($loop->index > 1)
                            <div class="archive1-custom-col-3">
                                <div class="archive-item-wrpp2">
                                    <div class="archive-shadow arch_margin">
                                        <div class="archive1_image2">
                                            <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                <img class="lazyload" src="{{ asset($item->image) }}" />
                                            </a>
                                            <div class="archive1-meta">
                                                <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                    <i class="la la-tags"> </i>  &nbsp; &nbsp; {{ $item->created_at->format('l M d Y') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="archive1-padding">
                                            <div class="archive1-title2">
                                                <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">
                                                    {{ $item->news_title }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                <div class="sitebar-fixd">
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
  </div>
@endsection
