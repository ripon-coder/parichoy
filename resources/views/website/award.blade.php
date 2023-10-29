@extends('layouts.website')
@section('content')
	<!-- Events Start -->
	<section class="all-events-section category-blog">
		<div class="page-heading">
			<div class="container"><h5 class="m-0"> 
				Awards
			</div>
		</div>
		<div class="container">
			<div class="row latest-update-news-item-wrapper">

				@if(count($category_post_data['all_data'])> 0)
					{{-- <div class="row"> --}}
					@foreach($category_post_data['all_data'] as $category_post)
					<div class="col-lg-3 col-md-3 latest-update-news-item-outer mb-3">
						<div class="latest-update-news-item">
							<?php
								$categoryPostImg = DB::table('post_images')->where('post_id', $category_post->id)->first();
							?>
							@if($categoryPostImg)
							<a class="image" href="{{route('single-news', $category_post->slug)}}">
								<img src="{{asset($categoryPostImg->post_image)}}">
							</a>
							@endif
							<div class="content">
								{{-- <div class="">
									@foreach($category_post->post_category_id as $category_id)
	                                    <?php
	                                    // $categoryData = DB::table('post_categories')->where('id',$category_id)->first();
	                                    ?>
	                                    @if($categoryData)
	                                    <a class="custom-badge" href="{{ route('category-news',$categoryData->id) }}">{{$categoryData->category_title}}</a>
	                                    @endif
	                                @endforeach
								</div> --}}
								<a class="title" href="{{route('single-news',$category_post->slug)}}">{{$category_post->title}}</a>
								<div class="meta">
									<h3 class="date">Published On {{ date('M d, Y', strtotime($category_post->created_at)) }}</h3>
								</div>
								<div class="description">
									{!! Str::limit($category_post->description,80) !!} <a href="{{route('single-news',$category_post->slug)}}" class="pgh-readmore">Read More</a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					{{-- <div class="col-md-4 latest-update-news-item-outer">
						<a class="latest-update-news-item" href="">
							<div class="image">
								<img src="{{asset('assets/website/image/Events-icon-2.jpg')}}">
							</div>
							<div class="content">
								<h2 class="title">Munshiganj Bikrampur Association USA Special Award</h2>
								<div class="meta">
									<h3 class="date">7 November 2019</h3>
								</div>
							</div>
						</a>
					</div> --}}
				{{-- </div> --}}
				<div class="custom-pagination">
					{{$category_post_data['all_data']->links()}}
				</div>
				@else
				<div class="text-center">
					Opps! No News Found
				</div>
				@endif
			</div>
		</div>
	</section>
	<!-- Events End -->
@endsection
