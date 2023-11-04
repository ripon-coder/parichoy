@extends('layouts.website')
@section('content')
    <div class="welcome">
        <section class="home-news-section">
            <div class="container fs-wrapper">
                <div class="row all-box-wrapper">
                    <div class="col-md-12 left-box fs-f-content">
                        @if($slider->isNotEmpty())
                            @include('website.video.carousel')
                        @endif
                        @if ($video_category->isNotEmpty())
                            @foreach ($video_category as $category)
                                <div class="left-box-news-inner fs-f-content-inner mt-1">
                                    <div class="heading">
                                        <a class="title" href="{{ route('more-video', $category) }}">{{ $category->title }}</a>
                                    </div>
                                    <div class="mt-1">
                                        <div class="row short-news-items-wrapper">
                                            @foreach ($category->video as $video)
                                                @if (12 >= $loop->iteration)
                                                    <div class="col-lg-2 col-md-2 col-sm-2 pt-2 pb-2"
                                                        style="position: relative;">
                                                        <img src="{{ asset('/upload/video-thumbnail/' . $video->thumbnail) }}"
                                                            alt="" height="150" width="100%">
                                                        <div
                                                            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -100%);">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="45"
                                                                height="45" fill="red" class="bi bi-youtube"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                                                            </svg>
                                                        </div>
                                                        <p style="font-size: 15px">
                                                            {{ strip_tags(Str::limit($video->title, 40)) }}</p>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        @if (count($category->video) > 6)
                                            <div class="text-right">
                                                <a href="{{ route('more-video', $category) }}"
                                                    class="d-inline-block mt-1 view-details-btn">More</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            Empty
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
{{-- <iframe width="100%" src="https://www.youtube.com/embed/{{ $video->youtube_id }}" allowfullscreen></iframe> --}}
