@extends('layouts.website')
@section('content')

    <div class="category-post">
        <section class="all-events-section category-blog">
            <div class="container pt-5 fs-wrapper">
                <div class="row">
                    <div class="col-lg-8 fs-f-content">
                        <div class="all-items-wrapper fs-f-content-inner">
                            <div class="heading mb-4">
                                <h2 class="title text-left">
                                    Search For : {{ $query ?: 'Search Post' }}
                                </h2>
                            </div>

                            @if (count($serchPosts) > 0)                    
                                @foreach ($serchPosts as $post)
                                    <div class="latest-update-news-item-outer">
                                        <div class="latest-update-news-item">
                                            <a class="image" href="{{ route('single-post', $post->slug) }}">
                                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" />
                                            </a>
                                            <div class="content">
                                                {{-- <div class="all_cat">
                                                    @if (count($post->categories))
                                                        @foreach ($post->categories as $category)
                                                            <a class="custom-badge" href="{{ route('category.product.view', $category->slug) }}">{{ $category->title }}</a>
                                                        @endforeach
                                                    @endif
                                                </div> --}}
                                                <a class="title" href="{{ route('single-post', $post->slug) }}">{{ $post->title }}</a>
                                                <div class="meta">
                                                    <h3 class="date">{{ englisht_To_Bangla_Date( $post->created_at ) }}</h3>
                                                </div>
                                                <div class="description">
                                                    <p>{!! strip_tags(Str::limit($post->description, 98)) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            

                            @if (count($serchPosts) > 0)
                                <div class="custom-pagination pt-5">
                                    <nav>
                                        {!! $serchPosts->links() !!}
                                    </nav>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="col-lg-4 fs-f-bar">
                       @include('website._partials.details-sidebar')
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
