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
							<h5 class="card-title">Replace Video</h5>
							<form action="{{ route('admin.video-gallery-update', $videoGallery->id) }}" method="post" enctype="multipart/form-data">
		                        @csrf

		                        <div class="position-relative form-group border-0">
									<div class="editVide" style="width: 254px">
										<iframe style="width: 100%" src="https://www.youtube.com/embed/{{ $videoGallery->video_url }}"></iframe>	
									</div><br>

									<label class="mb-0">Video ID</label>
									<div class="avatar-upload top-photo">
										<div class="product-video-items-wrapper">
											<div class="product-cover-photo">
												<input class="form-control p-cover-photo" type="text" name="video_url" value="{{ $videoGallery->video_url }}" required>
											</div>
										</div>
									</div>
								</div>

		                        <button class="mt-1 btn btn-primary" type="submit">Update</button>
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
