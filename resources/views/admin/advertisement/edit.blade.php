@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Advertisement
				</div>
			</div>
		</div>
	</div>
	<div class="tab-content">
		<div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
			<div class="row">
				<div class="col-md-8 m-auto">
					<div class="main-card mb-3 card">
						<div class="card-body">
							<h5 class="card-title">Edit Advertisement</h5>
							<form class="" action="{{ route('admin.advertisement.update', $advertise->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')

								<div class="position-relative form-group">
									<label for="name" class="">Company Name</label>
									<input name="name" id="name" placeholder="Enter Company Name" type="text" class="form-control" required value="{{$advertise->name}}">
								</div>

                                {{-- <div class="position-relative form-group">
									<label for="exampleEmail" class="">Description (Write Description, Image URL, Video URL etc.)</label>

									<textarea name="description" class="form-control summernote">{{ $advertise->description }}</textarea>

								</div> --}}

								{{-- <div class="position-relative form-group">
									<label class="">Status</label>
									<select name="status" class="form-control" required>
										<option {{($advertise->status ==1)?'selected':''}} selected value="1">Publish</option>
										<option {{($advertise->status == 0)?'selected':''}} value="0">Unpublish</option>
									</select>
								</div> --}}


								<div class="position-relative form-group">
									<img class="mb-2" src="{{ asset($advertise->image) }}" width="150"><br>
									<label for="exampleEmail" class="">Advertisement Photo</label>
									<input class="form-control" type="file" accept="image/*" name="image">
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
