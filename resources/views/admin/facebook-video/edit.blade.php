@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Replace Video
				</div>
			</div>
		</div>
	</div>

	

	<div class="tab-content">
		<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
			<div class="row">
				<div class="col-md-8 m-auto">
					<div class="main-card mb-3 card">
						<div class="card-body required-higlight">
							<h5 class="card-title">Add New Video</h5>
							<form action="{{ route('admin.add-facebook-video') }}" method="post" enctype="multipart/form-data">
		                        @csrf

		                        <div class="position-relative form-group border-0">
									@isset( $facebookVideo->video_url )
										<div class="editVide" style="width: 254px">
											
											<div id="fb-root"></div>
											<script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

											<!-- Your embedded video player code -->
											<div class="fb-video" data-href="https://www.facebook.com/facebook/videos/{{ $facebookVideo->video_url }}/" data-width="auto" data-allowfullscreen="true" data-show-text="false">
												{{-- <div class="fb-xfbml-parse-ignore">
													<blockquote cite="https://www.facebook.com/facebook/videos/{{ $footerVideo_2->video_url }}/">
													<a href="https://www.facebook.com/facebook/videos/{{ $footerVideo_2->video_url }}/">How to Share With Just Friends</a>
													<p>How to share with just friends.</p>
													Posted by <a href="https://www.facebook.com/facebook/">Facebook</a> on Friday, December 5, 2014
													</blockquote>
												</div> --}}
											</div>
										</div><br>
									@endisset

									<label class="mb-0">Video ID</label>
									<div class="avatar-upload top-photo">
										<div class="product-video-items-wrapper">
											<div class="product-cover-photo">
												<input class="form-control p-cover-photo" type="text" name="video_url" value="{{ isset( $facebookVideo->video_url ) ? $facebookVideo->video_url : old( 'video_url' ) }}" required>
											</div>
										</div>
									</div>
								</div>

		                        <button class="mt-1 btn btn-primary" type="submit">Submite</button>
		                        <button class="mt-1 btn modal-hide-btn cancel" type="reset">Cancel</button>
		                    </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
