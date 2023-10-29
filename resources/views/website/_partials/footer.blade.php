<footer class="footer-main">
    <div class="container">
        <div class="footer-top-box">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-nav-item-wrapper">
                        <div class="main-heading">
                            <h2 class="main-title">যোগাযোগ</h2>
                        </div>
                        <!-- Phone Number Start -->
                        <ul class="footer-nav-item-inner mb-0">
                            <li class="footer-nav-item">
                                <div>
                                    <span class="icon"><i class="fas fa-phone"></i></span>
                                    <a class="link" href="tel:{{ $g_about_us->phone }}">{{ $g_about_us->phone }}</a>
                                </div>
                            </li>
                        </ul>
                        <!-- Phone Number End -->
                        <!-- Email Address Start-->
                        <ul class="footer-nav-item-inner mb-0 email">
                            <li class="footer-nav-item">
                                <span class="icon"><i class="far fa-envelope"></i></span>
                                <a class="link" href="mailto:{{ $g_about_us->email }}">{{ $g_about_us->email }}</a>
                            </li>
                        </ul>
                        <!-- Email Address End -->
                        <!-- Location Start-->
                        <ul class="footer-nav-item-inner mb-0 email">
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
                <div class="col-md-3">
                    <div class="footer-nav-item-wrapper">
                        <!-- Quick Links Start -->
                        <div class="main-heading">
                            <h2 class="main-title">লিংক সমূহ</h2>
                        </div>
                        <ul class="footer-nav-item-inner quick-links border-0">
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $bangladesh->slug) }}">{{ $bangladesh->title }}</a>
                            </li>
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $community->slug) }}">{{ $community->title }}</a>
                            </li>
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $rest_of_world->slug) }}">{{ $rest_of_world->title }}</a>
                            </li>
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $juktorastra->slug) }}">{{ $juktorastra->title }}</a>
                            </li>
                            
                            <li class="footer-nav-item">
                                <a class="link" href="">বিজ্ঞাপনের মূল্য তালিকা</a>
                            </li>
                        </ul>
                        <!-- Quick Links End -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-nav-item-wrapper">
                        <!-- Quick Links Start -->
                        <div class="main-heading">
                            <h2 class="main-title">প্রয়োজনীয় লিংক</h2>
                        </div>
                        <ul class="footer-nav-item-inner quick-links border-0">
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $art_literature->slug) }}">{{ $art_literature->title }}</a>
                            </li>
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $entertainment->slug) }}">{{ $entertainment->title }}</a>
                            </li>
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $politics->slug) }}">{{ $politics->title }}</a>
                            </li>
                            <li class="footer-nav-item">
                                <a class="link" href="{{ route('category.product.view', $technology->slug) }}">{{ $technology->title }}</a>
                            </li>
                            
                        </ul>

                        <!-- Quick Links End -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-nav-item-wrapper">
                        <!-- Quick Links Start -->
                        <div class="main-heading">
                            <h2 class="main-title">সম্পাদক</h2>
                        </div>
                        <ul class="footer-nav-item-inner quick-links border-0">
                            <li class="footer-nav-item mb-2">
                                সম্পাদক: নাজমুল আহসান
                            </li>
                            <li class="footer-nav-item">
                                Editor & Publisher : M. Najmul Ahsan
                            </li>


                            <li class="footer-nav-item social-follow">
                                <a class="follow-link" target="_blank" href="{{ $g_about_us->fb_link }}">
                                    <img src="{{ asset('/') }}assets/website/images-icons/fb.png" />
                                </a>
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
                <div class="col-lg-6 copyright-left-box">
                    Copyright © {{ str_replace('_', ' ', config('app.name')) }}, {{date("Y")}}. Website Developed & Maintenance by
                    <a class="link company-logo" href="https://bijoytech.com/"><img src="{{ asset('/') }}assets/website/images-icons/bt-logo-01.png" /></a>
                </div>
                <div class="col-lg-6 sub-footer-menu">
                    <ul id="menu-footer-menu-1" class="menu">
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-461"><a href="https://parichoy.com/category/%e0%a6%95%e0%a6%ae%e0%a6%bf%e0%a6%89%e0%a6%a8%e0%a6%bf%e0%a6%9f%e0%a6%bf/">কমিউনিটি</a></li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-462">
                            <a href="https://parichoy.com/category/%e0%a6%af%e0%a7%81%e0%a6%95%e0%a7%8d%e0%a6%a4%e0%a6%b0%e0%a6%be%e0%a6%b7%e0%a7%8d%e0%a6%9f%e0%a7%8d%e0%a6%b0/">যুক্তরাষ্ট্র</a>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-463">
                            <a href="https://parichoy.com/category/%e0%a6%b6%e0%a6%bf%e0%a6%b2%e0%a7%8d%e0%a6%aa-%e0%a6%b8%e0%a6%be%e0%a6%b9%e0%a6%bf%e0%a6%a4%e0%a7%8d%e0%a6%af/">শিল্প সাহিত্য</a>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-464"><a href="https://parichoy.com/category/%e0%a6%ac%e0%a6%bf%e0%a6%a8%e0%a7%8b%e0%a6%a6%e0%a6%a8/">বিনোদন</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>