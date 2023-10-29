@extends('layouts.website')

@section('content')
	<!-- About US Section Start -->
	<section class="about-us-main-info-section">
		<div class="page-heading">
			<div class="container"><h5 class="m-0">About Us</h5></div>
		</div>

		<div class="container">
			<div class="main-heading mb-4">
				<h2 class="main-title text-left">{{ $aboutContent->title }}</h2>
			</div>
			<div class="top-box-wrapper">
				<div class="row top-image-wrapper">
					
					<div class="col-md-6">
						<div class="image">
							<img src="{{ isset( $aboutContent->imageOne ) ? $aboutContent->imageOne : asset('/assets/website/image/Banner-2.jpg')  }}">
						</div>
					</div>
					<div class="col-md-6">
						<div class="image">
							<img src="{{ isset( $aboutContent->imageTwo ) ? $aboutContent->imageTwo : asset('/assets/website/image/Banner-3.jpg')  }}">
						</div>
					</div>
				</div>
				<div class="top-description-wrapper">
					{!! $aboutContent->content !!}
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="history_one_wrap p-4 border border-dark">
							<div class="top-description-wrapper">
								<h5>Mission</h5>
								{!! Str::limit($OurMission->content, 1030) !!}
							</div>

							{{-- <div class="top-description-wrapper">
								<h5>Aim</h5>
								<p>The principal aim of the Press Club is to build a strong network among Bangladeshi Media Professionals (journalists, editors, reporters, publishers, etc) who are working in the USA.</p>
							</div> --}}
						</div>
					</div>

					<div class="col-md-6">
						<div class="history_one_wrap p-4 border border-dark">
							<div class="top-description-wrapper">
								<h5>Vission</h5>
								{!! Str::limit($OurVission->content, 1030) !!}
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Activity Start -->
			<div class="activity-of-assiociation">
				<div class="main-heading">
					<h2 class="main-title">Activity of {{ str_replace('_', ' ', config('app.name')) }} INC</h2>
				</div>


                <div class="activityconent assiociation-activity-items">
                    {!! $aboutContent->activity_content !!}
                </div>

			</div>
			<!-- Activity End -->
			<!-- Benifits Start -->
			<div class="activity-of-assiociation">
				<div class="main-heading">
					<h2 class="main-title">Benifits</h2>
				</div>

                <div class="activityconent assiociation-activity-items">
                     {!! $aboutContent->benifit_content !!}
                </div>
			</div>
			<!-- Benifits End -->

			<div class="membership-categories-of-assiociation">
				<div class="main-heading mb-4">
					<h2 class="main-title">Membership Categories</h2>
				</div>
				<div class="row membership-categories-item-wrapper justify-content-center">
					<div class="col-md-4 membership-categories-item-outer general">
						<div class="membership-categories-item-inner">
							<div class="heading">
								<h2 class="title">General Member</h2>
							</div>
							<div class="details">
								<p>Businessman currently working in print, broadcast or Web news media with at least six months experience in the New York area. Professional Businessman of print, broadcast and online media will qualify as primary members of the Club. Primary members shall have the right to participate in all activities of the organization. They are eligible to vote and contest election of the Club. Fee: $60/year.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 membership-categories-item-outer life">
						<div class="membership-categories-item-inner">
							<div class="heading">
								<h2 class="title">Associate Member</h2>
							</div>
							<div class="details">
								<p>Businessman and other workers of print, broadcast and online media and writers, and columnists, either working now or had worked previously in the USA or any other part of the world, are eligible to be associate members of the organization. Fee: $90/year.</p>
							</div>
						</div>
					</div>

					<div class="col-md-4 membership-categories-item-outer departed">
						<div class="membership-categories-item-inner">
							<div class="heading">
								<h2 class="title">Life Member</h2>
							</div>
							<div class="details">
								<p>Businessman and other workers of print, broadcast and online media; and writers, columnists, either working now or had worked previously, and those who are contributing or had contributed significantly to the development of journalism in the USA or any other part of the world, are eligible for being Life Member of the organization, provided two-thirds of the Executive Committee members approve the same. Life members will be inducted through formal ceremonies. Such members will be allowed to participate in all activities and to enjoy all benefits of the Club, except voting for and contesting election.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //About Us Section End -->
@stop
