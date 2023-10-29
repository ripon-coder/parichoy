@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Print & Media Category
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
							<h5 class="card-title">Edit Print & Media Category</h5>
							<form class="" action="{{ route('admin.print-media-categories.update',$category_data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
								<div class="position-relative form-group">
		                            <label class="">Category Name</label>
		                            <input name="title" placeholder="Enter Category Name" type="text" class="form-control" value="{{ $category_data->title }}" required>
		                        </div>

		                        <button class="mt-1 btn btn-primary" type="submit">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
