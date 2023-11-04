@extends('layouts.website')
@section('content')
    <div class="welcome">
        <section class="home-news-section">
            <div class="container fs-wrapper">
                <div class="row all-box-wrapper">
                    <div class="col-md-12 left-box fs-f-content">
                        <div class="left-box-news-inner fs-f-content-inner mt-1">
                            <div class="heading">
                                <a class="title" href="#">{{ $category->title }}</a>
                            </div>
                            <div class="mt-1">
                                <div class="row short-news-items-wrapper">
                                    @foreach ($video as $item)
                                        <div class="col-lg-3 col-md-6 col-sm-6">
                                            <iframe width="100%"
                                                src="https://www.youtube.com/embed/{{ $item->youtube_id }}" allowfullscreen></iframe>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center pt-3">
                {!!$video->links()!!}
                </div>
            </div>
        </section>
    </div>
@endsection
