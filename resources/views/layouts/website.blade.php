<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('website._partials.stylesheet')
</head>
@yield('styles')
<body>
        <div class="pa-preloader">
            <div class="pa-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <a href="#" id="scrollTopBtn" style="display: none;">
            <span><i class="fas fa-angle-up"></i></span>
        </a>
        <!-- Header Start-->

		@include('website._partials.header')
        <!-- Header End-->

        <main class="padding-top-190">
			@yield('content')
		</main>
        
        <!-- Footer Start -->
		@include('website._partials.footer')
        <!-- Footer End -->
        
        <!-- Script Start -->
		@include('website._partials.scripts')
        <!-- Script End -->

		@yield('scripts')
    </body>
</html>
