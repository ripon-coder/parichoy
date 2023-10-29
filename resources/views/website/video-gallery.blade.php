@extends('layouts.website')
@section('content')
	<!-- Image Grid Start -->
	<section class="video-gallery-grid-section">
		<div class="page-heading">
			<div class="container"><h5 class="m-0">Video Gallery</h5></div>
		</div>
		<div class="container">

			<div class="row all-video-item-wrapper">
                {{-- <div class="col-md-1"></div> --}}
				@if(count($g_video_gallery_data) > 0)
					@foreach($g_video_gallery_data as $video_data)
						<div class="col-md-6">
							<div class="video-item">
						    	{{-- {!! $video_data->video_url !!} --}}
                                <iframe src="https://www.youtube.com/embed/{{ $video_data->video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>

						    </div>
						</div>
					@endforeach
					
					<div class="pagination-section">
                        {!! $g_video_gallery_data->links() !!}
                    </div>
                @endif
                {{-- <div class="col-md-1"></div> --}}
			</div>
		</div>
	</section>
	<!-- Image Grid End -->
@endsection
