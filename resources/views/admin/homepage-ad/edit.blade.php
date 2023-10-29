@extends('layouts.admin')
@section('content')
<div class="app-main__inner">
	<div class="app-page-title">
		<div class="page-title-wrapper">
			<div class="page-title-heading">
				<div class="page-title-icon"> <i class="pe-7s-display1 icon-gradient bg-premium-dark"></i>
				</div>
				<div>Edit AD
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
							<h5 class="card-title">Edit AD</h5>
							<form method="POST" action="{{ route('admin.homepage-ad-store') }}" enctype="multipart/form-data">
								@csrf

								<div class="position-relative form-group">
									@isset($homepageAD->ad_1)
										<img class="mb-2" src="{{ asset($homepageAD->ad_1) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">1st AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_1">
								</div>

								<div class="position-relative form-group">
									@isset($homepageAD->ad_2)
										<img class="mb-2" src="{{ asset($homepageAD->ad_2) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">2st AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_2">
								</div>

								<div class="position-relative form-group">
									@isset($homepageAD->ad_3)
										<img class="mb-2" src="{{ asset($homepageAD->ad_3) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">3rd AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_3">
								</div>

								<div class="position-relative form-group">
									@isset($homepageAD->ad_4)
										<img class="mb-2" src="{{ asset($homepageAD->ad_4) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">4th AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_4">
								</div>

								<div class="position-relative form-group">
									@isset($homepageAD->ad_5)
										<img class="mb-2" src="{{ asset($homepageAD->ad_5) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">5th AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_5">
								</div>

								<div class="position-relative form-group">
									@isset($homepageAD->ad_6)
										<img class="mb-2" src="{{ asset($homepageAD->ad_6) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">Six AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_6">
								</div>

								<div class="position-relative form-group">
									@isset($homepageAD->ad_7)
										<img class="mb-2" src="{{ asset($homepageAD->ad_7) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">Seven AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_7">
								</div>

								{{-- <div class="position-relative form-group">
									@isset($homepageAD->ad_8)
										<img class="mb-2" src="{{ asset($homepageAD->ad_8) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">Sidebar 1st AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_8">
								</div> --}}

								{{-- <div class="position-relative form-group">
									@isset($homepageAD->ad_9)
										<img class="mb-2" src="{{ asset($homepageAD->ad_9) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">Sidebar 2nd AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_9">
								</div> --}}

								{{-- <div class="position-relative form-group">
									@isset($homepageAD->ad_10)
										<img class="mb-2" src="{{ asset($homepageAD->ad_10) }}" width="150"><br>
									@endisset
									<label for="exampleEmail" class="">Sidebar 3rd AD</label>
									<input class="form-control" type="file" accept="image/*" name="ad_10">
								</div> --}}

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
