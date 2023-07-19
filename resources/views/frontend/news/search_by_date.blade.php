@extends('frontend.home_dashboard')

@section('home')

<div class="archive-page1">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <div class="archive-topAdd"></div>

            </div>

        </div>

        <div class="row">

        <div class="col-lg-8 col-md-8">

            <div class="rachive-info-cats">

                <a href=" "><i class="las la-home"></i> </a>

                <i class="las la-chevron-right"></i> Search By Date {{ $formatDate }}

            </div>

            <div class="row">

                @foreach ($news as $item)

                    <div class="archive1-custom-col-3">
                        <div class="archive-item-wrpp2">
                        <div class="archive-shadow arch_margin">
                            <div class="archive1_image2">
                            <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} "
                                ><img class="lazyload" src="{{ asset($item->image) }}"
                            /></a>
                            <div class="archive1-meta">
                                <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} "
                                ><i class="la la-tags"> </i>
                                {{ $item->created_at->format('M d Y') }}
                                </a>
                            </div>
                            </div>

                            <div class="archive1-padding">
                            <div class="archive1-title2">
                                <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} ">{{ $item->news_title }}</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                @endforeach

               

            </div>
            
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="live-item">
                <div class="live_title">
                    <a href=" ">LIVE TV </a>
                    <div class="themesBazar"></div>
                </div>
                <div class="popup-wrpp">

                    @php

                        $live_tv = App\Models\LiveTvs::find(1);

                    @endphp

                    @if (isset($live_tv))
                        <div class="live_image">
                            <img width="700" height="400" src="{{ asset($live_tv->live_image) }}"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                alt="" loading="lazy">
                            <div data-mfp-src="#mymodal" class="live-icon modal-live"> <i class="las la-play"></i> </div>
                        </div>

                        <div class="live-popup">
                            <div id="mymodal" class="mfp-hide" role="dialog"
                                aria-labelledby="modal-titles" aria-describedby="modal-contents">
                                <div id="modal-contents">
                                    <div
                                        class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                        <iframe width="560" height="315" src="{{ $live_tv->live_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        
                    @endif
                    

                </div>
            </div>
            
            <div class="sitebar-fixd" style="position: sticky; top: 0;">
                <div class="singlePopular">
                    <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <div class="nav-link active" data-bs-toggle="pill"
                                data-bs-target="#archiveTab_recent" role="tab" aria-controls="archiveRecent"
                                aria-selected="true"> LATEST </div>
                        </li>
                        <li class="nav-item" role="presentation">
                            <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular"
                                role="tab" aria-controls="archivePopulars" aria-selected="false"> POPULAR
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

                                    {{-- <a href=" {{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }}" class="archiveTab-icon2"><i class="la la-play"></i></a> --}}

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

                                    {{-- <a href=" {{ url('news/details/'.$newsitem->id.'/'.$newsitem->news_title_slug) }}" class="archiveTab-icon2"><i class="la la-play"></i></a> --}}

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
                <div>
                    <div class="themesBazar_widget">
                        <h3 style="margin-top:5px"> OLD NEWS </h3>
                    </div>
                    <form class="wordpress-date" action="{{ route('search-by-date') }}" method="post">
                        @csrf
                        <div class="row m-0 p-0">
                            <div class="col-8 p-0 ">
                                <input type="date"   name="date" class="form-control w-100">
                            </div>
                            <div class="col-4 p-0">
                                 <input class="form-control w-100" type="submit" value="Search">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       

    </div>

</div>

@endsection
