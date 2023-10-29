@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Photo
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
							<h5 class="card-title">Edit Photo</h5>
							<form action="{{ route('admin.photo-gallery.update', $photoGallery->id) }}" method="post" enctype="multipart/form-data">
		                        @csrf

		                        <div class="position-relative form-group">
		                            <label class="">Title</label><br>
		                            <input type="text" name="title" class="form-control" value="{{ $photoGallery->title }}" required>
		                        </div>

		                        <div class="position-relative form-group">
									<img class="mb-2" src="{{ asset($photoGallery->image_url) }}" alt="" width="200"><br>
		                            <label class="">Images</label><br>
		                            <input type="file" name="image_url" class="form-control">
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
