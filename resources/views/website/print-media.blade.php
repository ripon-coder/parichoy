@extends('layouts.website')
@section('title', "Print And Media News")

@section('content')
	<div class="print-media mt-3">
		<!-- Popular Newspaper links section start -->
        <section class="popular-newspaper-section">
            <div class="container">
                <div class="heading">
                    <h2 class="title">
                        <span class="icon"><i class="far fa-newspaper"></i></span>
                        {{ $daily_newspaper->title }}
                    </h2>
                </div>
                <div class="main-content">
                    @forelse ( $daily_newspapers as $newspaper )
                        <a target="_blank" href="{{ $newspaper->link }}" class="news-item">
                            <img src="{{ asset($newspaper->image) }}" alt="" />
                        </a>
                    @empty
                        <h5 style="display: flex; justify-content: center; align-items: center;width: 100%;margin-bottom: 19px">No Found Media</h5>
                    @endforelse
                        
                </div>
            </div>
            

            <div class="container">
                <div class="heading">
                    <h2 class="title">
                        <span class="icon"><i class="far fa-newspaper"></i></span>
                        {{ $online_magazine->title }}
                    </h2>
                </div>
                <div class="main-content">
                    @forelse ( $online_magazines as $newspaper )
                        <a target="_blank" href="{{ $newspaper->link }}" class="news-item">
                            <img src="{{ asset($newspaper->image) }}" alt="" />
                        </a>
                    @empty
                        <h5 style="display: flex; justify-content: center; align-items: center;width: 100%;margin-bottom: 19px">No Found Media</h5>
                    @endforelse
                        
                </div>
            </div>
            

            <div class="container">
                <div class="heading">
                    <h2 class="title">
                        <span class="icon"><i class="far fa-newspaper"></i></span>
                        {{ $regional_magazine->title }}
                    </h2>
                </div>
                <div class="main-content">
                    @forelse ( $regional_magazines as $newspaper )
                        <a target="_blank" href="{{ $newspaper->link }}" class="news-item">
                            <img src="{{ asset($newspaper->image) }}" alt="" />
                        </a>
                    @empty
                        <h5 style="display: flex; justify-content: center; align-items: center;width: 100%;margin-bottom: 19px">No Found Media</h5>
                    @endforelse
                        
                </div>
            </div>
            
            
            <div class="container">
                <div class="heading">
                    <h2 class="title">
                        <span class="icon"><i class="far fa-newspaper"></i></span>
                        {{ $english_daily->title }}
                    </h2>
                </div>
                <div class="main-content">
                    @forelse ( $english_dailys as $newspaper )
                        <a target="_blank" href="{{ $newspaper->link }}" class="news-item">
                            <img src="{{ asset($newspaper->image) }}" alt="" />
                        </a>
                    @empty
                        <h5 style="display: flex; justify-content: center; align-items: center;width: 100%;margin-bottom: 19px">No Found Media</h5>
                    @endforelse
                        
                </div>
            </div>
            
            
            <div class="container">
                <div class="heading">
                    <h2 class="title">
                        <span class="icon"><i class="far fa-newspaper"></i></span>
                        {{ $television_media->title }}
                    </h2>
                </div>
                <div class="main-content">
                    @forelse ( $television_medias as $newspaper )
                        <a target="_blank" href="{{ $newspaper->link }}" class="news-item">
                            <img src="{{ asset($newspaper->image) }}" alt="" />
                        </a>
                    @empty
                        <h5 style="display: flex; justify-content: center; align-items: center;width: 100%;margin-bottom: 19px">No Found Media</h5>
                    @endforelse
                        
                </div>
            </div>
            
        </section>
	</div>
@endsection