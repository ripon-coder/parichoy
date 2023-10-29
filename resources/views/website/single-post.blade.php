@extends('layouts.website')
@section('content')
	<!-- Events Start -->
	<section class="all-events-section">
		<?php
			$singlePostImg = DB::table('post_images')->where('post_id', $single_post_data['all_data']['id'])->first();
		?>

		<div class="page-heading">
			<div class="container"><h5 class="m-0">{{ $single_post_data['all_data']['title'] }}</h5></div>
		</div>

		<div class="container">
			<div class="latest-update-news-item-wrapper">
				<div class="row">
					<div class="col-md-12 m-auto single-post-outer">
						<div class="single-post-inner">
							
							@if($singlePostImg)
								<div class="image text-center">
									<img src="{{asset($singlePostImg->post_image)}}" width="60%">
								</div>
							@endif
							<div class="midddle-content">
								{{-- <div class="mt-4 mb-2">
									@foreach($single_post_data['all_data']['post_category_id'] as $category_id)
	                                    <?php
	                                    // $categoryData = DB::table('post_categories')->where('id',$category_id)->first();
	                                    ?>
	                                    @if($categoryData)
	                                    <a class="custom-badge" href="{{ route('category-news',$categoryData->id) }}">{{$categoryData->category_title}}</a>
	                                    @endif
	                                @endforeach
								</div> --}}

								<h2 class="post-main-title mt-4">{{ $single_post_data['all_data']['title'] }}</h2>
								<h3 class="date-time">
									Published On  {{ date('M d, Y', strtotime($single_post_data['all_data']['created_at'])) }}
								</h3>
							</div>
							<div class="description">

								
							<?php

								$singlePostImgs = DB::table('post_images')->where('post_id', $single_post_data['all_data']['id'])->get()->skip( $singlePostImg->id );
							?>
							<div class="image mb-3">
								@if(count($singlePostImgs))
									@foreach ($singlePostImgs as $postImage)
										
											<img class="mb-0" src="{{asset($postImage->post_image)}}">
										
									@endforeach
								@endif
							</div>

							<div class="text-justify content-body"> {!! $single_post_data['all_data']['description'] !!}</div>
								
						</div>

						<div class="social_share mt-4">
							<h5>Social Share:</h5>
							<!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6072bd67e506e0ec"></script>
						</div>
                            
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Events End -->
@endsection
