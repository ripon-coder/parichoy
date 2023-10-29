@extends('layouts.website')
@section('content')

<!-- Main Intro Start-->
<!-- Main Slider Start-->
{{-- <section class="home-slider-section">
	<div class="home-main-slider-inner owl-carousel">
        @if ($sliders->isNotEmpty())
            @foreach ($sliders as $slider)
                <div class="item">
                    <img src="{{ asset($slider->image) }}" alt="images not found">
                    <div class="header-content">
                        <h2 class="title">{{ $slider->title }}</h2>
                    </div>
                </div>
            @endforeach
        @endif
	</div>
</section> --}}
<!-- Main Slider End-->


<div class="welcome">
    <!-- Headline scrolling Section start -->
    <section class="main-headline-section">
        <div class="container marquees-outer">
            <h3 class="main-title">শিরোনাম</h3>
            <div class="marquees">
                @forelse ($headlinePosts as $post)
                    <h4 class="item">
                        <a href="{{ route('single-post', $post->slug) }}">{{ $post->title }}</a>
                    </h4>
                @empty
                    <h4 class="item">
                        <a href="javascript:;">No Found Post</a>
                    </h4>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Headline scrolling Section end -->

    <!-- Home News section start -->
    <section class="home-news-section">
        <div class="container">
            <div class="row all-box-wrapper">
                <div class="col-md-3 left-box">
                    <div class="left-box-news-inner">
                        <div class="heading">
                            <a class="title" href="{{ route('category.product.view', $breakingNews->slug) }}">{{ $breakingNews->title }}</a>
                        </div>

                        <div class="short-news-items-wrapper">
                            @if (count($breakninNewPosts) > 0)
                                @foreach ($breakninNewPosts as $post)
                                    <a class="latest-update-news-item" href="{{ route('single-post', $post->slug) }}">
                                        <div class="image">
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                        </div>
                                        <div class="content">
                                            <h2 class="title"> {{ $post->title }} </h2>
                                            {{-- <div class="meta">
                                                <h3 class="date">
                                                    <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                </h3>
                                            </div> --}}
                                        </div>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 middle-box">
                    <div class="home-main-news-slider-inner owl-carousel">
                        @if (count($recentPosts) > 0)
                            @foreach ($recentPosts as $post)                           
                                <a href="{{ route('single-post', $post->slug) }}" class="slider-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <h2 class="title">{{ $post->title }}</h2>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-3 left-box">
                    <div class="left-box-news-inner">
                        <div class="heading">
                            <a class="title" href="{{ route('category.product.view', $moreReadable->slug) }}">{{ $moreReadable->title }}</a>
                        </div>
                        <div class="short-news-items-wrapper">
                            @if (count($moreReadablePosts) > 0)  
                                @foreach ($moreReadablePosts as $post)
                                    <a class="latest-update-news-item" href="{{ route('single-post', $post->slug) }}">
                                        <div class="image">
                                            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                        </div>
                                        <div class="content">
                                            <h2 class="title">{{ $post->title }}</h2>
                                            {{-- <div class="meta">
                                                <h3 class="date">
                                                    <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                </h3>
                                            </div> --}}
                                        </div>
                                    </a>
                                @endforeach  
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home News section end -->


    <!-- Home Common News section start -->
    <section class="home-news-section">
        <div class="container fs-wrapper">
            <div class="row all-box-wrapper">
                <div class="col-md-9 left-box fs-f-content">
                    <div class="left-box-news-inner fs-f-content-inner">
                        <div class="heading">
                            <a class="title" href="{{ route('category.product.view', $bangladesh->slug) }}">{{ $bangladesh->title }}</a>
                        </div>
                        <div class="row short-news-items-wrapper">
                            @if (count($bangladeshPosts) > 0)
                                @foreach ($bangladeshPosts as $post)
                                    <div class="col-lg-6">
                                        <a class="latest-update-news-item" href="{{ route('single-post', $post->slug) }}">
                                            <div class="image">
                                                 <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                            </div>
                                            <div class="content">
                                                <h2 class="title">{{ $post->title }}</h2>
                                                <div class="meta d-flex">
                                                    <h3 class="date">                                                       
                                                        <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                    </h3>
                                                    <h3 class="date ml-3">
                                                        <span><i class="far fa-eye"></i></span> 150
                                                    </h3>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                       
                        @isset ($homepageAD->ad_1)
                            <img class="mt-4" src="{{ asset('/') }}assets/website/images/Web-Banner-1.jpg">
                        @endisset
                        
                    </div>
                </div>

                <div class="col-md-3 left-box fs-f-bar">
                    <div class="fs-f-bar-inner">
                        <div class="wrapper">
                            <div class="heading">
                                <h2 class="title" href="">প্রিন্ট সংস্করণ</h2>
                            </div>
                            <a href="{{ route('single-archive-print-version', $latesPrintVersion->id) }}" class="d-block print-img">
                                <img class="w-100" src="{{ asset( $latesPrintVersion->image ) }}" alt="{{ $latesPrintVersion->title }}">
                            </a>     

                            <a class="print-subscribe-btn d-none" href="">সাবস্ক্রাইব করুন</a>
                        </div>

                        <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">আর্কাইভ প্রিন্ট সংস্করণ</h2>
                            </div>
                            <ul class="print-archive-list">
                                @if (count($archivPrintVersions) > 0)
                                    @foreach ($archivPrintVersions->skip(1) as $archivPrintVersion)
                                        <li>
                                            <a href="{{ route('single-archive-print-version', $archivPrintVersion->id) }}"> {{ $archivPrintVersion->title }} </a>
                                        </li>
                                    @endforeach
                                @endif

                                @if (count($archivPrintVersions) > 5)
                                    <li>
                                        <a class="more" href="{{ route('archive-print-version') }}"> ... More</a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        {{-- <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">আর্কাইভ</h2>
                            </div>
                            Calendar Plugin Here
                        </div> --}}

                        {{-- <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">RSS Feed</h2>
                            </div>
                            <a class="d-inline-block mt-3" href="https://validator.w3.org/feed/check.cgi?url=http%3A//parichoy.com/epaper/feed">
                                <img alt="[Valid RSS]" title="Valid RSS" src="{{ asset('/') }}assets/website/images/valid-rss-rogers.png">
                            </a>
                        </div> --}}

                        <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">All Media Link</h2>
                            </div>
                            <a class="d-inline-block mt-2" href="{{ route('print-media') }}">
                                <img alt="All Media Link" title="All Media Link" src="{{ asset('/') }}assets/website/images/Media-Link.jpg">
                            </a>
                        </div>

                        <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">সকল বিজ্ঞাপন</h2>
                            </div>
                            <a class="d-inline-block mt-2" href="{{ route('all-advertisement') }}">
                                <img alt="[সকল বিজ্ঞাপন]" title="সকল বিজ্ঞাপন" src="{{ asset('/') }}assets/website/images/a-ad.jpg">
                            </a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- Home Common News section end -->

    <!-- Home Common News section start -->
    <section class="home-news-section">
        <div class="container fs-wrapper">
            <div class="row all-box-wrapper">
                <div class="col-md-9 left-box fs-f-content">
                    <div class="fs-f-content-inner">
                        <div class="left-box-news-inner">
                            <div class="heading mb-3">
                                <a class="title" href="{{ route('category.product.view', $juktorastra->slug) }}">{{ $juktorastra->title }}</a>
                            </div>
                            <div class="latest-update-news-item-wrapper">
                                <div class="row">
                                    @if (count($juktorastraPosts) > 0)
                                        @foreach ($juktorastraPosts as $post)
                                            <div class="col-md-4 latest-update-news-item-outer ns-a">
                                                @if (count($post->categories) > 0)
                                                    @foreach ($post->categories as $category)
                                                        <a href="{{ route('category.product.view', $category->slug) }}" class="cat-all-post"> {{ $category->title }} </a>
                                                    @endforeach
                                                @endif
                                                <a class="latest-update-news-item font-style" href="{{ route('single-post', $post->slug) }}">
                                                    <div class="image">
                                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                                    </div>
                                                    <div class="content">
                                                        <h2 class="title mb-2"> {{ $post->title }} </h2>
                                                        <div class="meta d-flex">
                                                            <h3 class="date">
                                                                <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                            </h3>
                                                            <h3 class="date ml-3">
                                                                <span><i class="far fa-eye"></i></span> 150
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="left-box-news-inner">
                            <div class="heading mb-3">
                                <a class="title" href="{{ route('category.product.view', $international->slug) }}">{{ $international->title }}</a>
                            </div>
                            <div class="latest-update-news-item-wrapper">
                                <div class="row">
                                    @if (count($internationalPosts) > 0)
                                        @foreach ($internationalPosts as $post)
                                            <div class="col-md-4 latest-update-news-item-outer ns-a">
                                                @if (count($post->categories) > 0)
                                                    @foreach ($post->categories as $category)
                                                        <a href="{{ route('category.product.view', $category->slug) }}" class="cat-all-post"> {{ $category->title }} </a>
                                                    @endforeach
                                                @endif
                                                <a class="latest-update-news-item font-style" href="{{ route('single-post', $post->slug) }}">
                                                    <div class="image">
                                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                                    </div>
                                                    <div class="content">
                                                        <h2 class="title mb-2"> {{ $post->title }} </h2>
                                                        <div class="meta d-flex">
                                                            <h3 class="date">
                                                                <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                            </h3>
                                                            <h3 class="date ml-3">
                                                                <span><i class="far fa-eye"></i></span> 150
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row common-blog-box-wrapper">
                            <div class="col-lg-12 common-blog-box-outer">
                                <div class="common-blog-heading">
                                    <a class="title" href="{{ route('category.product.view', $rest_of_world->slug) }}">{{ $rest_of_world->title }}</a>
                                </div>
                                <div class="items-wrapper dfi-flex">
                                    @if (count($rest_of_worldPosts) > 0)
                                        @foreach ($rest_of_worldPosts as $post)
                                            <div class="common-blog-item rest_of_world">
                                                <a class="image" href="">
                                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                                </a>
                                                <div class="content">
                                                    {{-- @if (count($post->categories) > 0)
                                                        @foreach ($post->categories as $category)
                                                            <a href="{{ route('category.product.view', $category->slug) }}" class="cat-all-post"> {{ $category->title }} </a>
                                                        @endforeach
                                                    @endif --}}
                                                    <a class="title" href="{{ route('single-post', $post->slug) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                    <div class="meta d-flex">
                                                        <h3 class="date-time">
                                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                        </h3>
                                                        <h3 class="date-time ml-3">
                                                            <span><i class="far fa-eye"></i></span> 150
                                                        </h3>
                                                    </div>
                                                    <div class="common-blog-description">
                                                        <p>{!! strip_tags($post->description) !!}</p>
                                                    </div>
                                                    <a href="{{ route('single-post', $post->slug) }}" class="d-inline-block mt-4 view-details-btn">বিস্তারিত</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 left-box fs-f-bar">
                    <div class="fs-f-bar-inner">
                        <div class="wrapper">
                            <div class="add-slider-wrapper owl-carousel">
                                @if ( count( $advertisements ) > 0 )
                                    @foreach ($advertisements as $advertisement)
                                        <div class="item">
                                            <a class="d-inline-block mt-2" href="">
                                                <img alt="{{ $advertisement->name }}" title="Ad" src="{{ $advertisement->image }}">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="wrapper mt-4">
                            <div class="heading">
                                <a class="title" href="{{ route('category.product.view', $entertainment->slug) }}">{{ $entertainment->title }}</a>
                            </div>
                            <div class="short-news-items-wrapper">
                                @if (count($entertainmentPosts) > 0)  
                                    @foreach ($entertainmentPosts as $post)
                                        <a class="latest-update-news-item" href="{{ route('single-post', $post->slug) }}">
                                            <div class="image">
                                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                            </div>
                                            
                                            <div class="content">
                                                <h2 class="title">{{ $post->title }}</h2>
                                                <div class="meta">
                                                    <h3 class="date">
                                                        <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                                    </h3>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach  
                                @endif                                
                            </div>
                        </div>

                        <div class="wrapper mt-4">
                            <div class="add-slider-wrapper owl-carousel">
                                @if ( count( $advertisements ) > 0 )
                                    @foreach ($advertisements as $advertisement)
                                        <div class="item">
                                            <a class="d-inline-block mt-2" href="">
                                                <img alt="{{ $advertisement->name }}" title="Ad" src="{{ $advertisement->image }}">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">আবহাওয়া</h2>
                            </div>
                            <div class="weather-wrapper">
                                <style type="text/css">
                                    .ww_col2 {
                                        flex-direction: initial!important;
                                        flex-wrap: wrap;
                                    }

                                    .ww_col2 .svg-wrapper {
                                        display: none!important;
                                    }

                                    .svg-wrapper.wide {}

                                    .ww_col2 .data .temp {flex-direction: column!important;}

                                    .ww_col2 .ww_child.day-forecast {
                                        flex-direction: column!important;
                                        background: #f2f3fa!important;
                                        text-align: center!important;
                                        justify-content: center!important;
                                    }
                                    /*
                                    .ww_col2 .ww_child.day-forecast:first-child,.ww_col2 .ww_child.day-forecast:last-child {
                                        display: none!important;
                                    }*/

                                    .ww_col2 .ww_child.day-forecast {}

                                    .ww_col2 .ww_child.day-forecast * {
                                        text-align: center;
                                        width: 100%!important;
                                    }
                                </style>
                                <div id="ww_3e17b2d4" v='1.20' loc='id' a='{"t":"responsive","lang":"bn","ids":["wl712"],"cl_bkg":"#FFFFFF","cl_font":"#000000","cl_cloud":"#d4d4d4","cl_persp":"#2196F3","cl_sun":"#FFC107","cl_moon":"#FFC107","cl_thund":"#FF5722","sl_tof":"5","sl_sot":"fahrenheit","sl_ics":"one_a","font":"Arial","cl_odd":"#0000000a"}'>Weather for the Following Location: <a href="https://2ua.org/usa/new_york/map/" id="ww_3e17b2d4_u" target="_blank">New York, United States</a></div><script async src="https://srv2.weatherwidget.org/js/?id=ww_3e17b2d4"></script>
                            </div>
                        </div>

                        <div class="wrapper mt-4">
                            <a class="d-inline-block mt-2" href="">
                                <img alt="[সকল বিজ্ঞাপন]" title="সকল বিজ্ঞাপন" src="{{ asset('/') }}assets/website/images/df.gif">
                            </a>
                        </div>

                        <div class="wrapper mt-4">
                            <div class="heading">
                                <h2 class="title" href="">ভিজিটর কাউন্ট</h2>
                            </div>
                            <ul class="visitor-item-wrapper">
                                <li>
                                    <h4>TODAY</h4>
                                    <span class="text-left">{{ $g_todays_visitors }}</span>
                                </li>
                                <li>
                                    <h4>WEEKLY</h4>
                                    <span class="text-center d-block">{{ $g_weekly_visitors }}</span>
                                </li>
                                <li>
                                    <h4>MONTHLY</h4>
                                    <span class="text-right d-block">{{ $g_monthly_visitors }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 mb-3">
                    <img src="{{ asset('/') }}assets/website/images/Web-Banner.jpg" alt="">
                </div>
                <div class="col-lg-6 mb-3">
                    <img src="{{ asset('/') }}assets/website/images/Web-Banner.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Home Common News section end -->

    <!-- Common Blog Section Start-->
    <section class="common-blog-section pt-0">
        <div class="container">
            <div class="row common-blog-box-wrapper">
                <div class="col-lg-4 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="{{ route('category.product.view', $politics->slug) }}">{{ $politics->title }}</a>
                    </div>
                    <div class="items-wrapper">
                        @if (count($politicsPosts) > 0)
                            @foreach ($politicsPosts as $post)
                                <div class="common-blog-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <a class="title" href="{{ route('single-post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <div class="common-blog-description">
                                            <p>{!! strip_tags($post->description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="{{ route('category.product.view', $community->slug) }}">{{ $community->title }}</a>
                    </div>
                    <div class="items-wrapper">
                        @if (count($communityPosts) > 0)
                            @foreach ($communityPosts as $post)
                                <div class="common-blog-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <a class="title" href="{{ route('single-post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <div class="common-blog-description">
                                            <p>{!! strip_tags($post->description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="{{ route('category.product.view', $religion->slug) }}">{{ $religion->title }}</a>
                    </div>
                    <div class="items-wrapper">
                        @if (count($religionPosts) > 0)
                            @foreach ($religionPosts as $post)
                                <div class="common-blog-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <a class="title" href="{{ route('single-post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <div class="common-blog-description">
                                            <p>{!! strip_tags($post->description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            @isset($homepageAD->ad_4)
                <div class="row justify-content-center mt-5">
                    <div class="mb-3">
                        <img class="w-100" src="{{ asset( $homepageAD->ad_4 ) }}" alt="">
                    </div>
                </div>
            @endisset
        </div>
    </section>
    <!-- Common Blog Section End-->

    <!-- FB/YouTube Video, Photo and Video  Gallery Start -->
    
    <!-- FB/YouTube Video, Photo and Video  Gallery End -->

     <section class="home-news-section pt-0">
        <div class="container fs-wrapper">
            <div class="row all-box-wrapper">
                <div class="col-lg-6 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="javascript:;">ইউটিউব ভিডিও</a>
                    </div>

                    <div class="youtube-video">
                        <iframe width="100%" height="375" src="https://www.youtube.com/embed/{{ $footerVideo_1->video_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="javascript:;">ফেসবুক ভিডিও</a>
                    </div>

                    <div class="youtube-video">
                        
                        <div id="fb-root"></div>
                        <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

                        <!-- Your embedded video player code -->
                        <div class="fb-video" data-href="https://www.facebook.com/facebook/videos/{{ $footerVideo_2->video_url }}" data-width="auto" data-show-text="false">

                            {{-- <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/facebook/videos/{{ $footerVideo_2->video_url }}/">
                                <a href="https://www.facebook.com/facebook/videos/{{ $footerVideo_2->video_url }}/">How to Share With Just Friends</a>
                                <p>How to share with just friends.</p>
                                Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
                                </blockquote>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>

    <!-- Common Blog Section Start-->
    <section class="common-blog-section pt-0 pb-0">
        <div class="container">
            <div class="row common-blog-box-wrapper">
                <div class="col-lg-4 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="{{ route('category.product.view', $art_literature->slug) }}">{{ $art_literature->title }}</a>
                    </div>
                    <div class="items-wrapper">
                        @if (count($art_literaturePosts) > 0)
                            @foreach ($art_literaturePosts as $post)
                                <div class="common-blog-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <a class="title" href="{{ route('single-post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <div class="common-blog-description">
                                            <p>{!! strip_tags($post->description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="{{ route('category.product.view', $technology->slug) }}">{{ $technology->title }}</a>
                    </div>
                    <div class="items-wrapper">
                        @if (count($technologyPosts) > 0)
                            @foreach ($technologyPosts as $post)
                                <div class="common-blog-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <a class="title" href="{{ route('single-post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <div class="common-blog-description">
                                            <p>{!! strip_tags($post->description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 common-blog-box-outer">
                    <div class="common-blog-heading">
                        <a class="title" href="{{ route('category.product.view', $featured_news->slug) }}">{{ $featured_news->title }}</a>
                    </div>
                    <div class="items-wrapper">
                        @if (count($featured_newsPosts) > 0)
                            @foreach ($featured_newsPosts as $post)
                                <div class="common-blog-item">
                                    <div class="image">
                                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                    </div>
                                    <div class="content">
                                        <a class="title" href="{{ route('single-post', $post->slug) }}">
                                            {{ $post->title }}
                                        </a>
                                        <h3 class="date-time">
                                            <span><i class="far fa-clock"></i></span> {{ englisht_To_Bangla_Date( $post->created_at ) }}
                                        </h3>
                                        <div class="common-blog-description">
                                            <p>{!! strip_tags($post->description) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4 mb-3">
                    @isset($homepageAD->ad_5)
                        <img class="w-100" src="{{ asset( $homepageAD->ad_5 ) }}" alt="">
                    @endisset
                </div>
                <div class="col-lg-4 mb-3">
                    @isset($homepageAD->ad_6)
                        <img class="w-100" src="{{ asset( $homepageAD->ad_6 ) }}" alt="">
                    @endisset
                </div>
                <div class="col-lg-4 mb-3">
                    @isset($homepageAD->ad_7)
                        <img class="w-100" src="{{ asset( $homepageAD->ad_7 ) }}" alt="">
                    @endisset
                </div>
            </div>
        </div>
    </section>
    <!-- Common Blog Section End-->


    <!-- Important Link Section Start-->
    {{-- <section class="all-important-link-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 all-important-link-outer">
                    <div class="all-important-link-wrapper organization">
                        <div class="heading">
                            <span class="icon"><i class="fas fa-users"></i></span>
                            <h2 class="title">Other Foreign Association's</h2>
                        </div>
                        <ul class="all-important-link-item-wrapper organization">
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">Foreign Press Center</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">UN Media Accreditation</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">CPJ</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">CPJ Bangladesh</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">UN News and Media</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">New York Press Club</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">National Press Club, Dhaka</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">UN Correspondents Association</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">Bangladesh Press Council</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 all-important-link-outer">
                    <div class="all-important-link-wrapper sites">
                        <div class="heading">
                            <span class="icon"><i class="fas fa-link"></i></span>
                            <h2 class="title">Important Website's</h2>
                        </div>
                        <ul class="all-important-link-item-wrapper">
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">বাংলাদেশ সরকার</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">দূতাবাস DC</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">প্রধানমন্ত্রী</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">নিউইয়র্ক কন্স্যুলেট</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">পররাষ্ট্র মন্ত্রণালয়</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">লস এঞ্জেলেস কন্স্যুলেট</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">প্রবাসীকল্যাণ মন্ত্রণালয়</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">ইউএস এম্বেসি ঢাকা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">ই-সিটিজেন, বাংলাদেশ</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">ইউএস ইমিগ্রেশন</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">জাতীয় তথ্য বাতায়ন</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">আইআরএস</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">বাংলাদেশ বিমান</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">আবহাওয়া</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">শেয়ার মার্কেট DSE</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 all-important-link-outer">
                    <div class="all-important-link-wrapper newspaper">
                        <div class="heading">
                            <span class="icon"><i class="far fa-newspaper"></i></span>
                            <h2 class="title">Print & Online Media(USA)</h2>
                        </div>
                        <ul class="all-important-link-item-wrapper">
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক বাংলা পত্রিকা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক দেশবাংলা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক প্রথম আলো-আমেরিকা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক বাংলা টাইমস</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক বর্ণমালা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">টাইম টিভি</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">হক কথা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক আজকাল</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক ঠিকানা</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক বাঙালী</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক পরিচয়</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">সাপ্তাহিক প্রবাস</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">বিএনিউজ২৪.কম</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">বাংলা প্রেস</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">প্রবাস নিউজ</a>
                            </li>
                            <li class="all-important-link-item">
                                <a class="link" target="_blank" href="">খবর</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Important Link Section End-->

    <!-- Popular Newspaper links section start -->
    {{-- <section class="popular-newspaper-section">
        <div class="container">
            <div class="heading">
                <h2 class="title">
                    <span class="icon"><i class="far fa-newspaper"></i></span>
                    Print & Online Media(BD)
                </h2>
            </div>
            <div class="main-content">
                <a target="_blank" href="http://www.bdnews24.com/bangla/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978495_5fe7103fd5a49.jpg" />
                </a>
                <a target="_blank" href="http://www.dailysangram.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978419_5fe70ff3dac4e.jpg" />
                </a>
                <a target="_blank" href="http://www.samakal.com.bd/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978408_5fe70fe8920ea.jpg" />
                </a>
                <a target="_blank" href="http://www.prothom-alo.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978392_5fe70fd878338.jpg" />
                </a>
                <a target="_blank" href="http://www.dailynayadiganta.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978374_5fe70fc685593.jpg" />
                </a>
                <a target="_blank" href="http://www.mzamin.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978361_5fe70fb99ce6d.jpg" />
                </a>
                <a target="_blank" href="http://www.dailyjanakantha.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978350_5fe70fae7d6b0.jpg" />
                </a>
                <a target="_blank" href="http://www.dailyinqilab.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978338_5fe70fa23418a.jpg" />
                </a>
                <a target="_blank" href="http://www.bhorerkagoj.net/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978322_5fe70f9233fe9.jpg" />
                </a>
                <a target="_blank" href="http://www.mzamin.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978308_5fe70f8407374.jpg" />
                </a>
                <a target="_blank" href="http://www.bd-pratidin.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978289_5fe70f7182fff.jpg" />
                </a>
                <a target="_blank" href="http://www.dainikamadershomoy.com/" class="news-item">
                    <img src="{{ asset('/') }}assets/website/images/img_1608978066_5fe70e921e2a4.jpg" />
                </a>
            </div>
        </div>
    </section> --}}
    <!-- Popular Newspaper links section end -->

    <!-- Home Photo and Video  Gallery Start -->
    
    <!-- Home Photo and Video  Gallery End -->
</div>


@endsection
