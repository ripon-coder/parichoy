@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Slider
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
							<h5 class="card-title">Edit Slider</h5>
							<form class="" action="{{ route('admin.hero-slider.update', $heroslider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <img src="{{ asset($heroslider->image) }}" alt="" width="150">
                                <div class="position-relative form-group border-0">
					                <label class="mb-0">Slider Image (1480px X 340px)</label>
					                <div class="avatar-upload top-photo">
					                    <div class="product-cover-photo-items-wrapper">
					                        <div class="product-cover-photo">
					                            <input class="p-cover-photo" type="file" accept="image/*" name="image" required>
					                        </div>
					                    </div>
					                </div>
                                </div>

                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Slider Title <span>* </span>(Maximum 100 Characters)</label>
                                    <input name="title" id="exampleEmail" type="text" class="form-control" value="{{ $heroslider->title }}">
                                </div>


                                <div class="position-relative form-group">
									<label for="exampleSelect" class="">Status</label>
									<select name="status" id="exampleSelect" class="form-control" required>
										<option {{( $heroslider->status == 0) ? 'selected':''}} value="0">Unpublish</option>
										<option {{( $heroslider->status ==1 ) ? 'selected':''}} selected value="1">Publish</option>
									</select>
								</div>
								<button class="mt-1 btn btn-primary p-store-btn">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
