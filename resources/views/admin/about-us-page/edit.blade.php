@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit About Content
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
                            <h5 class="card-title">Edit Content</h5>

							<form action="{{ route('admin.about-content-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

								@isset($aboutContent->imageOne)
									<img class="mb-2" src="{{ asset($aboutContent->imageOne) }}" alt="" width="150px">
								@endisset
								
                                <div class="position-relative form-group border-0">
					                <label class="mb-0">Content Image One<span>*</span></label>
					                <div class="avatar-upload top-photo">
					                    <div class="product-cover-photo-items-wrapper">
					                        <div class="product-cover-photo">
					                            <input class="p-cover-photo" type="file" accept="image/*" name="imageOne">
					                        </div>
					                    </div>
					                </div>
                                </div>

								
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Title</label>
                                    <input name="title" id="exampleEmail" type="text" class="form-control" value="{{ isset( $aboutContent->title ) ? $aboutContent->title : old('title')}}">
                                </div>

                                <div class="position-relative form-group">
									<label for="exampleEmail" class="">About Page Description</label>
                                    <textarea name="content" id="editor1" name="eventLocation" id="exampleText" class="form-control" cols="10" rows="5">{{ isset($aboutContent->content) ? $aboutContent->content : old('content')  }}</textarea>
                                </div>


								<button class="mt-1 btn btn-primary p-store-btn">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
