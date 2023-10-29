@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Post
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
							<h5 class="card-title">Edit Post</h5>
							<form class="" action="{{ route('admin.post.update', $post_data->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')

								<div class="position-relative form-group">
									<label for="exampleEmail" class="">Post Title</label>
									<input name="title" id="exampleEmail" placeholder="Enter post name" type="text" class="form-control" required value="{{$post_data->title}}">
								</div>

								<div class="position-relative form-group">
									<label for="commonSelect" class="">Select Category</label><br>
									<select class="form-control select2" name="category_id[]" multiple="multiple" data-placeholder="Select Category">
										@if(count($categoryData) > 0)
											@foreach($categoryData as $category)
												<option value="{{ $category->id }}" 
													@foreach ($post_data->categories as $itemCat)
														{{ $category->id == $itemCat->id ? "selected" : "" }}
													@endforeach
													>{{ $category->title }}</option>
											@endforeach
										@else
											<option value="">No Category Found</option>
										@endif
									</select>
								</div>


                                <div class="position-relative form-group">
									<label for="exampleEmail" class="">Description (Write Description, Image URL, Video URL etc.)</label>
                                    {{-- <textarea id="editor2" name="description" id="exampleText" class="form-control" cols="30" rows="5" required>{{ $post_data->description }}</textarea> --}}

									
									<textarea name="description" class="form-control summernote">
										{!! $post_data->description !!}
									</textarea>
									

								</div>

								<div class="position-relative form-group">
									<label class="">Status</label>
									<select name="status" class="form-control" required>
										<option {{($post_data->status ==1)?'selected':''}} selected value="1">Publish</option>
										<option {{($post_data->status == 0)?'selected':''}} value="0">Unpublish</option>
									</select>
								</div>


								<div class="position-relative form-group">
									<img class="mb-2" src="{{ asset($post_data->image) }}" width="150"><br>
									<label for="exampleEmail" class="">Cover / Post Image</label>
									<input class="form-control" type="file" accept="image/*" name="image">
								</div>

								<div class="position-relative form-group">
									<div class="form-check form-check-inline">
										<input name="headline_post"  class="form-check-input" type="checkbox" id="headline_post" value="1" {{ $post_data->headline_post == 1 ? 'checked' : '' }}>
										<label class="form-check-label" for="headline_post">Post to Headline</label>
									</div>
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
<script type="text/javascript">
	$(document).on('click','.sp-image-remove', function(e){
	    var thisParent = $(this).closest('.single-product-image-prev-item');
	    var thisId = thisParent.attr('data-id');
	    $.ajax({
	        url:'{{ route("admin.post.image.delete") }}',
	        type:'get',
			data: { postid: thisId },
	        success: function (data){
	        	console.log(data);
	            if(data.success == 1){
	                thisParent.remove();
	                if(data.is_default == 1){
	                    $('.single-product-image-prev-item').last().append('<span class="sp-default-img">Cover</span>');
	                }
	            }
	        }
	    });
	});
</script>
@stop
