@extends('layouts.website')
@section('content')
	<!-- Image Grid Start -->
	<section class="image-gallery-grid-section">
		<div class="page-heading">
			<div class="container"><h5 class="m-0">Photo Gallery</h5></div>
		</div>

		<div class="container">
			<div class="main-heading">
				<!-- Preloader -->
				<div id="preloader">
				  <div id="status">&nbsp;</div>
				</div>
			</div>
			
			<div class="image-grid-inner gallery mb-5" id="imageGridGallery">
				@if(count($g_photo_gallery_data) > 0)
					@foreach($g_photo_gallery_data as $photo_data)
						<div class="item">
						  <a href="{{asset($photo_data->image_url)}}">
						    <img src="{{asset($photo_data->image_url)}}" />
						  </a>
						  {{-- <h2 class="title">{{ $photo_data->title }}</h2> --}}
						</div>
					@endforeach
				@endif
			</div>
			
			@if(count($g_photo_gallery_data) > 0)
				<div class="pagination-section mb-4">
                        {!! $g_photo_gallery_data->links() !!}
                </div>
        	@endif
        	
		</div>
	</section>
	<!-- Image Grid End -->
@endsection