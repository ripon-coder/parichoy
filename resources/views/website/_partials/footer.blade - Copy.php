@if ($g_about_us->phone)
<footer class="footer-main">
	<div class="container">
		<div class="footer-top-box">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-nav-item-wrapper">
						<div class="footer-logo-box">
							<div class="link">	
								@if ($g_about_us->footer_logo)
									<img src="{{asset($g_about_us->footer_logo)}}" style="width: 150px">
								@else
									<img src="{{asset('assets/website/image/footer-logo.png')}}" style="width: 94px">
								@endif
							</div>
							<div class="short-descriptiopn">
								{!! Str::limit($g_aboutUs_page->content, 200).'...' !!}
							</div>
							<a class="article-read-more" href="{{route('about-us')}}">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-nav-item-wrapper">
						<div class="main-heading">
							<h2 class="main-title">Contact Us</h2>
						</div>
						<!-- Phone Number Start -->
						<ul class="footer-nav-item-inner">
							{{-- <li class="footer-nav-item">
								<span class="icon"><i class="fas fa-phone"></i></span>
								<a class="link" href="tel:{{$g_about_us->phone}}">{{$g_about_us->phone}}</a>
                            </li> --}}

							<li class="footer-nav-item">
                                    <div>
                                        <span class="icon"><i class="fas fa-phone"></i></span>
                                        <a class="link" href="tel:{{ $g_about_us->phone }}">{{ $g_about_us->phone }} <span>(President)</span></a>
                                    </div>
                                @endif
                                 
                                @if ($g_about_us->phone_two)
                                    <div>
                                        <span class="icon"><i class="fas fa-phone"></i></span>
                                        <a class="link" href="tel:{{ $g_about_us->phone_two }}">{{ $g_about_us->phone_two }} <span>(GS)</span></a>
                                    </div>
                                @endif
                                    
                                @if ($g_about_us->phone_three)
                                    <div>
                                        <span class="icon"><i class="fas fa-phone"></i></span>
                                        <a class="link" href="tel:{{ $g_about_us->phone_three }}">{{ $g_about_us->phone_three }} <span>(AGS)</span></a>
                                    </div>
                                @endif
                                
                                @if ($g_about_us->phone_four)
                                    <div>
                                        <span class="icon"><i class="fas fa-phone"></i></span>
                                        <a class="link" href="tel:{{ $g_about_us->phone_four }}">{{ $g_about_us->phone_four }} <span>(Treasurer)</span></a>
                                    </div>
                                @endif

                                @if ($g_about_us->phone_five)
                                    <div>
                                        <span class="icon"><i class="fas fa-phone"></i></span>
                                        <a class="link" href="tel:{{ $g_about_us->phone_five }}">{{ $g_about_us->phone_five }} <span>(Org Sec)</span></a>
                                    </div>
                                @endif
                            </li>

						</ul>
						<!-- Phone Number End -->
						<!-- Email Address Start-->
						<ul class="footer-nav-item-inner email">
							{{-- <li class="footer-nav-item">
								<span class="icon"><i class="far fa-envelope"></i></span>
								<a class="link" href="mailto:{{$g_about_us->email}}">{{$g_about_us->email}}</a>
                            </li> --}}

							<li class="footer-nav-item">
								@if ($g_about_us->email)
									<div><span class="icon"><i class="far fa-envelope"></i></span>
									<a class="link" href="mailto: {{ $g_about_us->email }}">{{ $g_about_us->email }}</a></div>
								@endif

								@if ($g_about_us->email_two)
									<div><span class="icon"><i class="far fa-envelope"></i></span>
									<a class="link" href="mailto: {{ $g_about_us->email_two }}">{{ $g_about_us->email_two }}</a></div>
								@endif

								@if ($g_about_us->email_three)
									<div><span class="icon"><i class="far fa-envelope"></i></span>
									<a class="link" href="mailto: {{ $g_about_us->email_three }}">{{ $g_about_us->email_three }}</a></div>
								@endif
							</li>
						</ul>
						<!-- Email Address End -->
						<!-- Location Start-->
						<ul class="footer-nav-item-inner email">
							<li class="footer-nav-item address">
								<span class="icon"><i class="fas fa-map-marker-alt"></i></span>
								<div class="link address-location">
									{!! $g_about_us->address !!}
								</div>
							</li>
						</ul>

						<!-- Location End -->
						<!-- Website Start-->
						<!-- <div class="heading">
							<h2 class="title">Website</h2>
						</div>
						<ul class="footer-nav-item-inner website">
							<li class="footer-nav-item">
								<span class="icon"><i class="fas fa-globe"></i></span>
								<a class="link" href="https://nybdpressclub.org">www.yourwebsite.com/</a>
							</li>
						</ul> -->
						<!-- Website End -->
					</div>
				</div>
				<!-- Address Start -->
				<div class="col-md-3">
					<div class="footer-nav-item-wrapper">
						<!-- Quick Links Start -->
						<div class="main-heading">
							<h2 class="main-title">Quick Links</h2>
						</div>
						<ul class="footer-nav-item-inner quick-links border-0">
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('about-us') }}">About Us</a>
                            </li>

							<li class="footer-nav-item">
								<a class="link" href="{{ route('applicationfrom') }}">Application Form</a>
							</li>

							<li class="footer-nav-item">
								<a class="link" href="{{ route('executive-committee') }}">Executive Committee</a>
                            </li>

							<li class="footer-nav-item">
								<a class="link" href="{{ route('general-member') }}">General Member</a>
                            </li>

                            <li class="footer-nav-item">
								<a class="link" href="{{ route('membership.login') }}">Members Login</a>
							</li>

							<li class="footer-nav-item">
								<a class="link" href="{{ route('updateinfo') }}">Update Your Info</a>
                            </li>

                            <li class="footer-nav-item social-follow">
								<a class="follow-link donate-btn" href="{{ route('donate') }}">
									{{-- <img src="{{asset('assets/website/image/button.png')}}"> --}}
									Contribution
								</a>
							</li>
						</ul>
						<!-- Quick Links End -->
					</div>
				</div>
				<!-- Address End -->
				<div class="col-md-3">
					<div class="footer-nav-item-wrapper">
						<!-- Quick Links Start -->
						<div class="main-heading">
							<h2 class="main-title">More Link</h2>
						</div>
						<ul class="footer-nav-item-inner quick-links border-0">
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('blog-post') }}">Events/News</a>
                            </li>

                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('constitutions') }}">Constitution</a>
                            </li>

                            <li class="footer-nav-item">
								<a class="link" href="{{ route('photo-gallery') }}">Photo Gallery</a>
							</li>
							<li class="footer-nav-item">
								<a class="link" href="{{ route('video-gallery') }}">Video Gallery</a>
                            </li>

							<li class="footer-nav-item">
								<a class="link" href="{{ route('privacy-policy') }}">Privacy Policy</a>
                            </li>

                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('term-of-service') }}">Terms of Services</a>
                            </li>

							{{-- <li class="footer-nav-item social-follow">
								<a class="follow-link" target="_blank" href="{{ $g_about_us->fb_link }}">
									<img src="{{asset('assets/website/image/fb.png')}}">
								</a>
							</li> --}}

							<li class="footer-nav-item social-follow socialLink">
								@if ($g_about_us->fb_link)
									<a class="follow-link fb-link" target="_blank" href="{{ $g_about_us->fb_link }}">
										<i class="fab fa-facebook-f"></i>
									</a>
								@endif

								@if ($g_about_us->instra_link)
									<a class="follow-link instagram-link" target="_blank" href="{{ $g_about_us->instra_link }}">
										<i class="fab fa-instagram"></i>
									</a>
								@endif

								@if ($g_about_us->twitter_link)
									<a class="follow-link twitter-link" target="_blank" href="{{ $g_about_us->twitter_link }}">
										<i class="fab fa-twitter"></i>
									</a>
								@endif

								@if ($g_about_us->youtube_link)
									<a class="follow-link youtube-link" target="_blank" href="{{ $g_about_us->youtube_link }}">
										<i class="fab fa-youtube"></i>
									</a>
								@endif

								@if ($g_about_us->google_link)
									<a class="follow-link linkedin-link" target="_blank" href="{{ $g_about_us->google_link }}">
										<i class="fab fa-linkedin"></i>
									</a>
								@endif
							</li>
						</ul>
						<!-- Quick Links End -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 copyright-left-box">
					Copyright © <a class="link" href="/">{{ str_replace('_', ' ', config('app.name')) }}</a> {{date("Y")}}. Website Developed & Maintenance by <a class="link company-logo" href="https://bijoytech.com/"><img src="{{asset('assets/logo/bt-logo-01.png')}}"></a>
				</div>
			</div>
		</div>
	</div>
</footer>