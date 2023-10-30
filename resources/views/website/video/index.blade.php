@extends('layouts.website')
@section('content')

    <div class="welcome">
        <section class="home-news-section">
            <div class="container fs-wrapper">
                <div class="row all-box-wrapper">
                    <div class="col-md-12 left-box fs-f-content">
                        <div class="left-box-news-inner fs-f-content-inner">
                            <div class="heading">
                                <a class="title"
                                    href="{{ route('category.product.view', $bangladesh->slug) }}">{{ $bangladesh->title }}</a>
                            </div>
                            <div class="row short-news-items-wrapper">
                                @if (count($bangladeshPosts) > 0)
                                    @foreach ($bangladeshPosts as $post)
                                        <div class="col-lg-6">
                                            <a class="latest-update-news-item"
                                                href="{{ route('single-post', $post->slug) }}">
                                                <div class="image">
                                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                                </div>
                                                <div class="content">
                                                    <h2 class="title">{{ $post->title }}</h2>
                                                    <div class="meta d-flex">
                                                        <h3 class="date">
                                                            <span><i class="far fa-clock"></i></span>
                                                            {{ englisht_To_Bangla_Date($post->created_at) }}
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
                </div>
            </div>
        </section>
    </div>


@endsection
