@extends('admin.layouts.app')
@section('title','Add Post')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Add Post Page
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
							<h5 class="card-title">Add Post</h5>
							<form class="" action="" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="position-relative form-group">
									<label for="exampleEmail" class="">Category Name</label>
									<input name="title" id="exampleEmail" placeholder="Enter post name" type="text" class="form-control">
								</div>


								<div class="position-relative form-group">
									<label class="">Sub Category</label><br>
									<select name="parent_category_id"  class="form-control select2" required multiple="multiple">

										@if(count($post_category))
											<option value="0">Uncategory</option>
											@foreach($post_category as $categoryData)
												@php $dash = ''; @endphp
												<option value="{{$categoryData->id}}">{{$categoryData->title}}</option>

												@if( count ( $categoryData->subCategories ))
													@include('admin.category.sub-category',['subcategories' => $categoryData->subCategories])
												@endif
											@endforeach
										@endif

									</select>
								</div>
                              
								<div class="position-relative form-group">
									<label for="exampleSelect" class="">Status</label>
									<select name="status" id="exampleSelect" class="form-control">
										<option value="0">Unpublish</option>
										<option selected value="1">Publish</option>
									</select>
								</div>

								<div class="position-relative form-group">
									<label for="exampleFile" class="">Upload Image</label>
									<input name="post_image" id="exampleFile" type="file" class="form-control-file" required>
								</div>

								<button class="mt-1 btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
