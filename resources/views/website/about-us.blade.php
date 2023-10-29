@extends('layouts.website')
@section('content')
	<!-- About US Section Start -->
	<section class="about-us-main-info-section profile-main-section">
		<div class="page-heading">
			<div class="container"><h5 class="m-0">About Us</h5></div>
		</div>
		<div class="container">

			{{-- <div class="top-info">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo accusamus ea labore? Eius quisquam eum at, minima repellendus perferendis. Optio voluptatibus nam quis neque debitis cumque, ducimus adipisci nobis blanditiis!</p>
			</div> --}}
			<div class="col-md-8 m-auto profile-content-inner">
				<div class="row content-item">
					<div class="col-md-4 left-box">
						<div class="image">
							<img src="{{ asset($g_about_us->profile_pic) }}" style="max-width: 100%;">
						</div>
						{{-- <div class="info">
							<h2 class="title">{{$g_about_us->name}}</h2>
							<h3 class="subtitle">{{$g_about_us->designation}}</h3>
							<h3 class="text">Cell: <a href="tel:{{$g_about_us->phone}}">{{$g_about_us->phone}}</a></h3>
						</div> --}}
					</div>
					<div class="col-md-8 right-box">
						<div class="description">
							{!! $g_about_us->profile_description !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //About Us Section End -->
@endsection
