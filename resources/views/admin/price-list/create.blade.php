@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Ad Price
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
							<h5 class="card-title">Add Price Content</h5>
							<form class="" action="{{ route('admin.pricing-list.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <div class="position-relative form-group">
                                    <label for="price" class="">Price <span>*</span></label>
                                    <input name="price" id="price" type="number" class="form-control" required>
                                </div>

                                <div class="position-relative form-group">
                                    <label for="title" class="">Title <span>*</span></label>
                                    <input name="title" id="title" type="text" class="form-control" required>
                                </div>

                                <div class="position-relative form-group">
                                    <label class="">Duration <span>*</span></label>
                                    <input name="duration" type="number" class="form-control" required>
                                </div>

                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Content<span>*</span></label>
                                   <textarea id="HCKEditor" name="content" id="exampleText" class="form-control" cols="30" rows="5" required></textarea>
                                </div>



                                <div class="position-relative form-group">
									<label for="exampleSelect" class="">Status</label>
									<select name="status" id="exampleSelect" class="form-control" required>
										<option value="0">Unpublish</option>
										<option selected value="1">Publish</option>
									</select>
								</div>
								<button class="mt-1 btn btn-primary p-store-btn">Submit</button>

                                <a href="{{ route('admin.pricing-list.index') }}" class="btn btn-primary float-right">Back to Pricing List</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
