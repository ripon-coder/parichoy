@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Category
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
							<h5 class="card-title">Edit Category</h5>
							<form class="" action="{{ route('admin.categories.update',$category_data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
								<div class="position-relative form-group">
		                            <label class="">Category Name</label>
		                            <input name="title" placeholder="Enter Category Name" type="text" class="form-control" value="{{ $category_data->title }}" required>
		                        </div>

								<div class="position-relative form-group">
									<label for="exampleSelect" class="">Sub Category</label>
									<select name="parent_category_id" id="exampleSelect" class="form-control select2" multiple="multiple" data-placeholder="Select Category">
										
										@if(count($post_category))
											<option value="0">Uncategory</option>
											@foreach($post_category as $categoryes)
											
												@php $dash = '-- '; @endphp
												<option {{ ($category_data->parent_category_id == $categoryes->id ) ? 'selected' : '' }} value="{{$categoryes->id}}">{{$categoryes->title}}</option>

												@if( count ( $categoryes->subCategories ))
													@include('admin.post-category.sub-category',['subcategories' => $categoryes->subCategories])
												@endif
											@endforeach
										@endif
									</select>
								</div>

								<div class="position-relative form-group">
									<label class="">Category Priority</label>
									<input name="position" placeholder="Enter Category Priority" type="number" class="form-control" value="{{ $category_data->position }}">
								</div>

								<div class="position-relative form-group">
									<label for="exampleSelect" class="">Status</label><br>
									<select name="status" class="form-control" required>
										<option {{ $category_data->status == 1 ? 'Selected': ''  }} value="1">Publish</option>
										<option {{ $category_data->status == 0 ? 'Selected': ''  }} value="0">Unpublish</option>
									</select>
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
