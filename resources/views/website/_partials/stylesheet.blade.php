<title>Parichay</title>
<meta charset="UTF-8" />
<meta name="description" content="Parichay"/>
<meta name="keywords" content="Parichay"/>
<meta name="author" content="Parichay"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
@if ($g_about_us->favicon_icon)
    <link rel="shortcut icon" href="{{ asset($g_about_us->favicon_icon) }}">
@else
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/dashboard-image.png') }}">
@endif
<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Fonts -->
<link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;500;600;700;900&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/slick-slider/slick.main.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/slick-slider/slick.theme.min.css" />
<!-- Grid Gallery CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/grid-gallery/jquery.scripttop.min.css" />

<!-- Lightbox CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/grid-gallery/lightbox.min.css" />
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<!-- Sweet Alert -->
<script src="{{ asset('/') }}assets/website/js/sweet-alert.min.js"></script>
<!-- Fontawesome -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/fonts/fontawesome/css/all.css" />

<link href="{{asset('assets/toastr/css/toastr.min.css')}}" rel="stylesheet">

<!-- Light box css -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/css/lightbox.min.css" />

<!-- Animate CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
<!-- Owl Carousel CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/owl-carousel/owl.carousel.min.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/owl-carousel/owl.theme.default.min.css" />

<!-- Main Style CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/css/style.css" />
<link rel="stylesheet" type="text/css" href="{{ asset('/') }}assets/website/css/custom.css" />

