<!-- Bootstrap Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!-- Slick JS -->
<script src="{{ asset('/') }}assets/website/slick-slider/slick.min.js"></script>

<!-- Light js -->
<script src="{{ asset('/') }}assets/website/js/lightbox.min.js"></script>
{{-- <script src="{{ asset('/') }}assets/website/js/lightbox-plus-jquery.min.js"></script> --}}


<!-- Owl Carousel JS -->
<script src="{{ asset('/') }}assets/website/owl-carousel/owl.carousel.min.js"></script>
<!-- Marquee CDN -->
<script src="{{ asset('/') }}assets/website/marquee/jquery.marquee.js" type="text/javascript"></script>
<!-- Grid Gallery Js -->
<script src="{{ asset('/') }}assets/website/grid-gallery/GridHorizontal.js"></script>
<script src="{{ asset('/') }}assets/website/grid-gallery/imagesloaded.pkgd.min.js"></script>
<!-- Progressbar js -->
<script src="{{ asset('/') }}assets/website/js/progressbar.js"></script>
<!-- Lightbox Js -->
<script src="{{ asset('/') }}assets/website/grid-gallery/lightbox.js"></script>
<!-- Sticky Bar -->
<script src="{{ asset('/') }}assets/website/js/sticky-sidebar.js"></script>

<script src="{{ asset('assets/toastr/js/toastr.min.js') }}"></script>

<!-- Main JS -->
<script type="text/javascript" src="{{ asset('/') }}assets/website/js/main.js"></script>




<!-- 3d-flip-book-jquery -->
<script src="{{ asset('/') }}assets/website/3d-flip-book/js/libs/jquery.min.js"></script>
<script src="{{ asset('/') }}assets/website/3d-flip-book/js/libs/html2canvas.min.js"></script>
<script src="{{ asset('/') }}assets/website/3d-flip-book/js/libs/three.min.js"></script>
<script src="{{ asset('/') }}assets/website/3d-flip-book/js/libs/pdf.min.js"></script>
<script src="{{ asset('/') }}assets/website/3d-flip-book/js/libs/pdf.worker.js"></script>

<script src="{{ asset('/') }}assets/website/3d-flip-book/js/dist/3dflipbook.js"></script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script type="text/javascript">
    // toastr script
    @if (Session::has('message'))
        toastr.success('{{Session::get('message')}}');
    @elseif(Session::has('error'))
        toastr.error('{{Session::get('error')}}');

    @elseif($errors)
        @foreach ($errors->all() as $error)
        toastr.error('{{$error}}');
        @endforeach
    @endif
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en', 
            includedLanguages: 'bn,en',
            autoDisplay : false,
            multilanguagePage: true, 
            gaTrack: true, 
            layout: google.translate.TranslateElement.InlineLayout.SIMPLE
        }, 'google_translate_element');
    }

    function triggerHtmlEvent(element, eventName) {
        var event;
        if (document.createEvent) {
            event = document.createEvent('HTMLEvents');
            event.initEvent(eventName, true, true);
            element.dispatchEvent(event);
        } else {
            event = document.createEventObject();
            event.eventType = eventName;
            element.fireEvent('on' + event.eventType, event);
        }
    }

    jQuery('.lang-select').click(function() {
        var theLang = jQuery(this).attr('data-lang');
        jQuery('.goog-te-combo').val(theLang);

        //alert(jQuery(this).attr('href'));
        window.location = jQuery(this).attr('href');
        location.reload();

    });

</script>




