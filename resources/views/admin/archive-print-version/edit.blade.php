@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit Archive Print Version
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
							<form class="" action="{{ route('admin.archive-print-versions.update', $printVersion->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								@method('PUT')
								<div class="position-relative form-group">
									<label for="exampleEmail" class="">Title</label>
									<input name="title" id="exampleEmail" placeholder="Enter Print Version Title" type="text" class="form-control" value="{{ $printVersion->title }}" required>
								</div>

								<div class="position-relative form-group">
									<label class="">Status</label>
									<select name="status" class="form-control" required>
										<option {{($printVersion->status ==1)?'selected':''}} selected value="1">Publish</option>
										<option {{($printVersion->status == 0)?'selected':''}} value="0">Unpublish</option>
									</select>
								</div>

								<div class="position-relative form-group border-0">
									<img class="mb-2" src="{{ asset( $printVersion->image ) }}" alt="" width="150"><br>
					                <label class="mb-0">Cover Photo</label>
					                <div class="avatar-upload top-photo">
					                    <div class="product-cover-photo-items-wrapper">
					                        <div class="product-cover-photo">
					                            <input class="p-cover-photo" type="file" accept="image/*" name="image">
					                        </div>
					                    </div>                                
					                </div>
					            </div>

								<div class="position-relative form-group border-0">
									<img class="mb-2" src="{{ asset('/') }}assets/admin/images/pdf.png" alt="" width="100"><br>
					                <label class="mb-0">Upload Print Version File</label>
					                <div class="avatar-upload top-photo">
					                    <div class="product-cover-photo-items-wrapper">
					                        <div class="product-cover-photo">
					                            <input class="p-cover-photo" type="file" accept="image/*" name="file">
					                        </div>
					                    </div>                                
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
