@extends('frontend.home_dashboard')
@section('title') 
    Reporter
@endsection
@section('home')
<section class="author-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    @foreach ($news as $item)
                        <div class="custom-col-6">
                            <div class="author-wrpp">
                                <div class="authorNews-image">
                                    <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}" ><img class="lazyload" src="{{ asset($item->image) }}"/></a>
                                </div>
                                <div class="authorPage-content">
                                    <h2 class="authorPage-title">
                                        <a href=" {{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h2>
                                    <div class="author-date">
                                        <a href="{{ url('news/details/'.$item->id.'/'.$item->news_title_slug) }} "> {{ $item->userRelation_name }} </a>
                                        <span>
                                            <i class="las la-clock"></i>  {{ $item->created_at->format('l M d Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $news->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="fixd-sitebar" style="position: sticky; top: 0">
                <div class="authorPage-content" style="  background: #fbf7f7;   border: 2px solid #e1dfdf; border-radius: 5px; " >
                    <figure class="authorPage-image">
                    <img alt=""src="{{ (!empty($reporter->photo)) ? asset($reporter->photo) :asset('upload/no_image.jpg') }}"class="avatar avatar-96 photo" height="96" width="96" loading="lazy" />
                    </figure>
                    <h1 class="authorPage-name">
                    <a href=" "> {{ $reporter->name }} </a>
                    </h1>
                    <div class="author-social text-center fw-bold">
                        @php
                            $sitesetting= App\Models\SiteSetting::first();
                        @endphp
                        <a href="{{ isset($sitesetting->social_icon_1_url)?$sitesetting->social_icon_1_url:'#'; }}" target="_black" >
                            {!! isset($sitesetting->social_icon_1)?$sitesetting->social_icon_1:''; !!}
                        </a>
                        <a href="{{ isset($sitesetting->social_icon_2_url)?$sitesetting->social_icon_2_url:'#'; }}" target="_black" >
                            {!! isset($sitesetting->social_icon_2)?$sitesetting->social_icon_2:''; !!}
                        </a>
                        <a href="{{ isset($sitesetting->social_icon_3_url)?$sitesetting->social_icon_3_url:'#'; }}" target="_black" >
                            {!! isset($sitesetting->social_icon_3)?$sitesetting->social_icon_3:''; !!}
                        </a>
                        <a href="{{ isset($sitesetting->social_icon_4_url)?$sitesetting->social_icon_4_url:'#'; }}" target="_black" >
                            {!! isset($sitesetting->social_icon_4)?$sitesetting->social_icon_4:''; !!}
                        </a>
                    </div>
                    <div class="author-details" style="text-align: justify">
                    
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
