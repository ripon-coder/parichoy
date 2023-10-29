@extends('layouts.website')
@section('content')
	<!-- Contact-us-section -->
	<section class="contact-us-section">
		<div class="page-heading">
			<div class="container"><h5 class="m-0">Quick Contact</h5></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="home-about-us-left-box">
						<div class="home-about-us-left-item">
							<div class="heading">
								<h2 class="title">Address</h2>
							</div>
							<div class="content">
								<ul class="about-us-usefull-links-wrapper">
									<li class="address">
										{!! $g_about_us->address !!}
									</li>
								</ul>
							</div>
						</div>
						<div class="home-about-us-left-item">
							<div class="heading">
								<h2 class="title">Phone Number</h2>
							</div>
							<div class="content">
								<ul class="about-us-usefull-links-wrapper">
									<li class="contact">
										@if ($g_about_us->phone)
											<div><span class="title"><i class="fas fa-phone"></i></span>
											<a class="link" href="tel:{{ $g_about_us->phone }}">
												{{ $g_about_us->phone }}
											</a>(President)</div>
										@endif

										@if ($g_about_us->phone_two)
											<div><span class="title"><i class="fas fa-phone"></i></span>
											<a class="link" href="tel:{{ $g_about_us->phone_two }}">
												{{ $g_about_us->phone_two }} 
											</a>(GS)</div>
										@endif

										@if ($g_about_us->phone_three)
											<div><span class="title"><i class="fas fa-phone"></i></span>
											<a class="link" href="tel:{{ $g_about_us->phone_three }}">
												{{ $g_about_us->phone_three }}
											</a>(AGS)</div>
										@endif

										@if ($g_about_us->phone_four)
											<div><span class="title"><i class="fas fa-phone"></i></span>
											<a class="link" href="tel:{{ $g_about_us->phone_four }}">
												{{ $g_about_us->phone_four }}
											</a>(Treasurer)</div>
										@endif

										@if ($g_about_us->phone_five)
											<div><span class="title"><i class="fas fa-phone"></i></span>
											<a class="link" href="tel:{{ $g_about_us->phone_five }}">
												{{ $g_about_us->phone_five }} 
											</a>(Org Sec)</div>
										@endif
									</li>
								</ul>
							</div>
						</div>
						<div class="home-about-us-left-item">
							<div class="heading">
								<h2 class="title">Email</h2>
							</div>
							<div class="content">
								<ul class="about-us-usefull-links-wrapper">
									<li class="contact">

										@if ($g_about_us->email)
											<div><span class="title"><i class="far fa-envelope"></i></span>
											<a class="link" href="mailto: {{ $g_about_us->email }}">
												{{ $g_about_us->email }}
											</a></div>
										@endif

										@if ($g_about_us->email_two)
											<div><span class="title"><i class="far fa-envelope"></i></span>
											<a class="link" href="mailto: {{ $g_about_us->email_two }}">
												{{ $g_about_us->email_two }}
											</a></div>
										@endif

										@if ($g_about_us->email_three)
											<div><span class="title"><i class="far fa-envelope"></i></span>
											<a class="link" href="mailto: {{ $g_about_us->email_three }}">
												{{ $g_about_us->email_three }}
											</a></div>
										@endif

									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="contact-us-form-wrapper">
						<div class="contact-us-form-inner">
							<form class="row" action="{{route('contact-us.message')}}" method="post">
								@csrf
								<div class="col-md-6 pr-md-1 input-group">
									<label for="name">Name<span> *</span></label>
									<input id="name" type="text" name="name" placeholder="Name" required>
								</div>
								<div class="col-md-6 pl-md-1 input-group">
									<label for="phone">Phone<span> *</span></label>
									<input id="phone" type="number" name="phone" placeholder="Phone" required>
								</div>
								<div class="col-md-12 input-group email">
									<label for="email">Email<span> *</span></label>
									<input id="email" type="email" name="email" placeholder="Email" required>
								</div>
								<div class="col-md-12 input-group email">
									<label for="message">Subject<span> *</span></label>
									<input type="text" name="subject" placeholder="Subject" required>
								</div>
								<div class="col-md-12 input-group email">
									<label for="message">How Can We Help<span> *</span></label>
									<textarea id="message" name="message" placeholder="Message" rows="5"></textarea>
								</div>
								{{-- <!-- Recaptcha start -->
								<div class="g-recaptcha" data-sitekey="6Lec0MwZAAAAAHa-rDGpojrJY3rQjj-BoPA-ngBh"></div>
								<span id="captcha" style="color:red" /></span> <!--Error Message-->
								<!-- Recaptcha end --> --}}
								<br>
								<div class="button-wrapper">
									<button type="submit" name="submit">Send</button>
								</div>
							</form>
							<span class="success-or-error">
							<?php

								if(!empty($_SESSION['success'])){
									echo $_SESSION['success'];
									$success = $_SESSION['success'];
									echo '<script type="text/javascript">swal("Thank You!","'.$success.'", "success")</script>';
								}

								if(!empty($_SESSION['error'])){
									$error = $_SESSION['error'];
									echo '<script type="text/javascript">swal("'.$error.'");</script>';
								}

								if(!empty($_SESSION['validation_error'])){
									$validationError = $_SESSION['validation_error'];
									echo '<script type="text/javascript">swal("'.$validationError.'");</script>';
								}
							?>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //Contact-us-section -->

	<!-- Map Section Start -->
	<section class="company-location-map-section">
		<div class="company-location-map-wrapper">
			{!! $g_about_us->embeded_link !!}
		</div>
	</section>
	<!-- Map Section End -->
<?php
	unset($_SESSION['validation_error']);
	unset($_SESSION['error']);
	unset($_SESSION['success']);
?>
@endsection
