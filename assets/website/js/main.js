// preloader
jQuery(".pa-ellipsis").fadeOut(), jQuery(".pa-preloader").delay(1000).fadeOut("500")

// Scroll To Top Button
$(window).scroll(function(){ 
  if ($(this).scrollTop() > 200) { 
    $('#scrollTopBtn').fadeIn(); 
  } else { 
    $('#scrollTopBtn').fadeOut(); 
  } 
}); 
$('#scrollTopBtn').click(function(){ 
  $("html, body").scrollTop(0);
  //$("html, body").animate({ scrollTop: 0 }, 600); 
  return false; 
});





// Fixed Header
$scroll = $(this).scrollTop();
if($scroll>=100){
	$('body').addClass('fixed-header');
}else{
	$('body').removeClass('fixed-header');
}
$(window).scroll(function(){
	$scroll = $(this).scrollTop();
	if($scroll>=100){
		$('body').addClass('fixed-header');
	}else{
		$('body').removeClass('fixed-header');
	}
});


// Navbar Toggle Button For Mini Device
$('.navbar-menu-toggle-btn').click(function(){
	$('.navbar-main').toggleClass('menu-visible');
	$('body').toggleClass('body-overflow');
});

// Navbar Submenu Make Collapse In Mini Device
$(window).on('load', function() {
	if($(window).width() <= 1024){
		$('.nav-item-submenu').addClass('collapse');
	}else{
		$('.nav-item-submenu').removeClass('collapse');
	}
});
$(window).on('resize', function() {
	if($(window).width() <= 1024){
		$('.nav-item-submenu').addClass('collapse');
	}else{
		$('.nav-item-submenu').removeClass('collapse');
	}
	if($(window).width() >= 1024){
	    $('body').removeClass('body-overflow');
	  }
});

// Navbar Toggle Button For Mini Device
$(".item-has-submenu .nav-item-link").click(function(e){
	e.preventDefault();
    $(this).parent().find(".collapse").collapse('toggle');
});

// Header Search From Show/hide
$(".header-search-btn").click(function(e){
    e.preventDefault();
    $(this).parent().find(".collapse").collapse('toggle');
});


// Home Main Top Slider
$('.home-main-slider-inner').owlCarousel({
    loop:true,
    margin:0,
    mouseDrag:true,
    autoplay:true,
    // animateOut: 'slideOutDown',
  	// animateIn: 'flipInX',
  	smartSpeed:1000,
  	autoplayTimeout:6000,
    autoplayHoverPause: false,
    responsiveClass: true,
    navText: ['<span><i class="fas fa-angle-left"></i></span>','<span><i class="fas fa-angle-right"></i></span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    },
    dots: true,
    nav:true,
});


// Home Photo Gallery Slider
jQuery(document).ready(function($) {    
    $('.photo-video-gallery-outer.photo .slider-for').slick({
      autoplay: true,
      autoplaySpeed: 4000,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      fade: true,
      asNavFor: '.photo .slider-nav'
    });


    $('.photo-video-gallery-outer.photo .slider-nav').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.photo .slider-for',
      arrows: true,
      centerMode: true,
      focusOnSelect: true
    });

    // Home Video Gallery Slider
    $('.photo-video-gallery-outer.video .slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.video .slider-nav'
    });
    $('.photo-video-gallery-outer.video .slider-nav').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      asNavFor: '.video .slider-for',
      arrows: true,
      centerMode: true,
      focusOnSelect: true
    });
});

// Advertisement Slider
$('.home-main-news-slider-inner').owlCarousel({
    loop:true,
    margin:0,
    mouseDrag:false,
    autoplay:true,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    smartSpeed:1000,
    autoplayTimeout:10000,
    autoplayHoverPause: false,
    responsiveClass: true,
    //navText: ['<span><i class="fas fa-angle-left"></i></span>','<span><i class="fas fa-angle-right"></i></span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    },
    nav: false,
    dots: false,
    dotsData: true,
    //nav:true,
});

// Advertisement Slider
$('.a-banner-slider-inner').owlCarousel({
    loop:true,
    margin:0,
    mouseDrag:false,
    autoplay:true,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    smartSpeed:1000,
    autoplayTimeout:6000,
    autoplayHoverPause: false,
    responsiveClass: true,
    //navText: ['<span><i class="fas fa-angle-left"></i></span>','<span><i class="fas fa-angle-right"></i></span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    },
    dots: true,
    dotsData: true,
    //nav:true,
});

// Image Gallery 
if ( $(".image-grid-inner").length>0 ){
  $('body').imagesLoaded( function() {
    $('.image-grid-inner').GridHorizontal({
      item: '.item',
      minWidth: 400,
      maxRowHeight: 350,
      gutter: 5,
    });
  });
  (function() {
      var $gallery = new SimpleLightbox('.image-grid-inner a', {});
  })();
}


// Headline Marquee JS
setTimeout(function(){ 
  jQuery('.main-headline-section .marquees').css("opacity","1");

}, 100);
jQuery('.main-headline-section .marquees').marquee({
  speed: 25000,
  gap: 0,
  delayBeforeStart: 0,
  direction: 'left',
  duplicated: true,
  pauseOnHover: true
});
// JS for Progress Bar
$('.progressbar').progressBar({
    shadow: true,
    percentage: true,
    animation: true,
    barColor: "#00A99D",
});

// Image Gallery Preloader
$(window).on('load', function() { // makes sure the whole site is loaded 
  $('#status').fadeOut(1000); // will first fade out the loading animation 
  $('#preloader').delay(350).fadeOut(1000); // will fade out the white DIV that covers the website. 
  setTimeout(function(){
    $('.image-gallery-grid-section .image-grid-inner').delay(350).css({'opacity':'1'});
  },1000);
})


// Add Slider
$('.add-slider-wrapper').owlCarousel({
    loop:true,
    margin:0,
    mouseDrag:false,
    autoplay:true,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    smartSpeed:1000,
    autoplayTimeout:6000,
    autoplayHoverPause: true,
    responsiveClass: true,
    //navText: ['<span><i class="fas fa-angle-left"></i></span>','<span><i class="fas fa-angle-right"></i></span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    },
    dots: false,
    nav:false,
});


// Related Post Slider
$('.single-blog-related-post').owlCarousel({
    loop:true,
    margin:15,
    mouseDrag:true,
    autoplay:true,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    smartSpeed:1000,
    autoplayTimeout:6000,
    autoplayHoverPause: true,
    responsiveClass: true,
    navText: ['<span><i class="fas fa-angle-left"></i></span>','<span><i class="fas fa-angle-right"></i></span>'],
    responsive:{
        0:{
            items:1,
            dots: true,
            nav:true,
        },
        600:{
            items:1,
            dots: true,
            nav:true,
        },
        1000:{
            items:3,
            dots: true,
            nav:true,
        }
    },
    dots: true,
    nav:true,
});


// Sticky Sidebar
$(document).ready(function(){
    var fsKey = 0;
    $('.fs-wrapper').each(function(){
        let fsWrapper = $(this);
        fsWrapper.addClass('fs-'+fsKey);

        let fsFBar = $(this).find('.fs-f-bar');
        let fsBarKey = fsFBar.addClass('fs-'+fsKey)

        let fsFBarInner = $(this).find('.fs-f-bar-inner');
        fsFBarInner.addClass('fs-'+fsKey);

        let fsFContent = $(this).find('.fs-f-content');
        fsFContent.addClass('fs-'+fsKey);

        let fsFContentInner = $(this).find('.fs-f-content-inner');
        fsFContentInner.addClass('fs-'+fsKey);

        let fsFBarHeight = fsFBarInner.height();
        let fsFContentHeight = fsFContentInner.height();
        //console.log(fsFContentHeight);

        if(fsFBarHeight > fsFContentHeight){
            //console.log(fsFBarHeight);
            $('.fs-f-content.fs-'+fsKey).stickySidebar({
                topSpacing: 0,
                side: 'left',
                container: '.fs-wrapper.fs-'+fsKey,
                sidebarInner: '.fs-f-content-inner.fs-'+fsKey,
                callback: function() {
                    //console.log('Sticky sidebar fired!');
                }
            });
        }else if(fsFBarHeight < fsFContentHeight){
            // console.log(fsBarS);
            $('.fs-f-bar.fs-'+fsKey).stickySidebar({
                topSpacing: 0,
                side: 'right',
                container: '.fs-wrapper.fs-'+fsKey,
                sidebarInner: '.fs-f-bar-inner.fs-'+fsKey,
                callback: function() {
                    //console.log('Sticky sidebar fired!');
                }
            });
        }

        fsKey++;
    });
});