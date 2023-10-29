<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SubscribesUser;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AllImageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\SubscribeLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\PaymentController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\HomepageAdController;
use App\Http\Controllers\Website\DonationController;
use App\Http\Controllers\Admin\AboutUsPageController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PrintAndNewsController;
use App\Http\Controllers\Website\SubscribeUserProfile;
use App\Http\Controllers\Admin\AdversisementController;
use App\Http\Controllers\Admin\PrintNewsCategoryController;
use App\Http\Controllers\Admin\ArchivePrintVersionController;
use App\Http\Controllers\Website\RegisterPlanFrontController;
use App\Http\Controllers\Subscribe\Auth\ResetPasswordController;
use App\Http\Controllers\Subscribe\Auth\ForgotPasswordController;
use App\Http\Controllers\Website\MemberShipUpdateInfoFrontController;
use App\Http\Controllers\Website\MemberApplicationFromFrontController;
use App\Http\Controllers\Website\VideoController;

// Cache Clear
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
});

// Website Routes
Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');

// Route::get('/all-news', [HomeController::class, 'allNews'])->name('all-news');

Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contact-us');
Route::post('/serarch', [PageController::class, 'SearchPost'])->name('search');

Route::post('/contact-us/message', [PageController::class, 'contactUsMessage'])->name('contact-us.message');

Route::get('/category/{slug}', [PageController::class, 'categoryBasedPosts'])->name('category.product.view');
Route::get('/single-post/{slug}', [PageController::class, 'SinglePost'])->name('single-post');

Route::get('/photo-gallery', [PageController::class, 'photoGallery'])->name('photo-gallery');
Route::get('/video-gallery', [PageController::class, 'videoGallery'])->name('video-gallery');

Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/term-of-service', [PageController::class, 'termOfService'])->name('term-of-service');
Route::get('/print-media', [PageController::class, 'printMedia'])->name('print-media');
Route::get('/archive', [PageController::class, 'archivePost'])->name('archive');
Route::get('/archive-print-version', [PageController::class, 'Archive_Print_Version'])->name('archive-print-version');
Route::get('/all-advertisement', [PageController::class, 'getAllAdvertisement'])->name('all-advertisement');

Route::get('/single-archive-print-version/{id}', [PageController::class, 'Single_archive_Print_Version'])->name('single-archive-print-version');

Route::get('/video',[VideoController::class,'index'])->name('video');

Route::resource('/comment-store', CommentController::class);


// Route::get('/update-info', [MemberShipUpdateInfoFrontController::class,'index'])->name('updateinfo');
// Route::post('/update-info-send', [MemberShipUpdateInfoFrontController::class,'SendMail'])->name('update-info-send');

// Route::get('/register-plan', [RegisterPlanFrontController::class,'Index'])->name('register-plan');
// Route::get('/subscribe-register-form', [RegisterPlanFrontController::class,'RegisterForm'])->name('subscribe-register-form');
// Route::resource('/subscribe-user-profile', SubscribeUserProfile::class)->middleware('auth:subscriber');

//Subscribe Payment
// Route::post('/subscribe-user-data', [PaymentController::class, 'subscribeUser'])->name('subscribe-user-data');

// Route::get('/subscribe-user-profile-payment', [PaymentController::class, 'subscribePaymentPage'])->name('subscribe-user-profile-payment-page');

// Route::post('/subscribe-user-profile-payment', [PaymentController::class, 'subscribePayment'])->name('subscribe-user-profile-payment');


//Renew Payment
// Route::get('/subscribe-renew', [PaymentController::class,'subscribeRenew'])->name('subscribe-renew');
// Route::post('/update-subscribe-user', [SubscribeUserProfile::class, 'update_Subscribe_Profile'])->name('update-subscribe-user');
// Route::get('/payment/execute', [PaymentController::class, 'executeCardPayment'])->name('execute-card-payment');
// Route::get('/payment/cancel', [PaymentController::class, 'CancelCardPayment'])->name('cancel-card-payment');
// Route::get('/payment/success', [PaymentController::class, 'SuccessCardPayment'])->name('successs-card-payment');


// Route::get('/donate', function(){
//     return view('website.donate');
// })->name('donate');


// Paypal Donation Form
// Route::post( 'donation',  [ DonationController::class, 'donationPayment' ] )->name('donation.payment');
// Route::get('/donation-payment/execute', [DonationController::class, 'executeCardPayment'])->name('execute-donation-card-payment');
// Route::get( 'donation/success',  [ DonationController::class, 'SuccessCardPayment' ] )->name('donation.success');
// Route::get( 'donation/cancelled',  [ DonationController::class, 'CancelCardPayment' ] )->name('donation.cancelled');



Route::group(['prefix' => 'membership', 'as'=>'membership.'], function () {
    Route::get('/login',  [SubscribeLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login',  [SubscribeLoginController::class, 'login' ])->name('login.submit');
    Route::post('/logout', [SubscribeLoginController::class, 'logout' ])->name('logout');


    // Password Reset Routes...
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');

    Route::post('/password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');

    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

    Route::post('/password/reset', [ResetPasswordController::class, 'reset']);

});



// Admin Panel Routes
Route::group(['middleware' =>'auth'], function () {
	Route::group(['prefix' => '/admin', 'as'=>'admin.'], function () {
		Route::resource('/hero-slider', HeroSliderController::class);


		// Admin Module
		Route::get('/profile-edit/{id}', [AdminController::class, 'profileEdit'])->name('profile-edit');
		Route::put('/profile-update/{id}', [AdminController::class, 'profileUpdate'])->name('profile-update');

		// Dashboard Home Module
		Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');

		// Home Intro Module
		// Route::get('/home-intro', [AboutUsController::class, 'homeIntro'])->name('home-intro');
		Route::post('/home-intro/store', [AboutUsController::class, 'homeIntroStore'])->name('home-intro.store');

		// Post Category Module
		Route::resource('/categories', PostCategoryController::class);

		// Post Module
		Route::get('/posts', [PostController::class, 'index'])->name('post.all');
		Route::get('/delete-editor-existing-image', [PostController::class, 'DeleteEditorExistingImage'])->name('delete-editor-existing-image');

		Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
		Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
		Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
		Route::get('/post/image/delete', [PostController::class, 'postImageDelete'])->name('post.image.delete'); //Ajax Image Delete
		Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
		Route::delete('/post/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');
        
        Route::resource('/subscribe-user', SubscribesUser::class);
        Route::get('/expired-user', [SubscribesUser::class, 'expiredUser'])->name('expired-user');
        Route::get('/subscribe-status/{id}', [SubscribesUser::class, 'Subscribe_Status_Update'])->name('subscribe-status');
        // Route::resource('/pricing-list', PriceingListController::class);

        Route::get('/delele-junks', [SettingsController::class, 'deleteJunks'])->name('delele-junks');

		// All Image Module
		Route::get('/photo-gallery-image-serach', [AllImageController::class, 'gallery_Image_Search'])->name('photo-gallery-image-serach');
		Route::post('/all-image/store', [AllImageController::class, 'store'])->name('all-image.store');
		Route::delete('/all-image/destroy/{id}', [AllImageController::class, 'destroy'])->name('all-image.destroy');

		// About/Profile Module
		Route::get('/about-us', [AboutUsController::class, 'create'])->name('about-us');
		Route::post('/about-us/store', [AboutUsController::class, 'store'])->name('about-us.store');

		// Photo & Video Gallery Module
		Route::get('/photo-gallery', [AllImageController::class, 'photoGallery'])->name('photo-gallery');
		Route::post('/photo-gallery/store', [AllImageController::class, 'photoGalleryStore'])->name('photo-gallery.store');
		// Route::delete('/photo-gallery/destroy/{id}', [AllImageController::class, 'photoGalleryDestroy'])->name('photo-gallery.destroy');
		Route::get('/photo-gallery-reorder', [AllImageController::class, 'photoGalleryReorder'])->name('photo-gallery-reorder');


        // Photo Gallery lightbox
		Route::get('/delete-gallery-image', [AllImageController::class, 'deletePhotos'])->name('delete.gallery.image');
        Route::get('/photo-gallery/edit/{id}', [AllImageController::class, 'photoGalleryEdit'])->name('photo-gallery.edit');
        Route::post('/photo-gallery/update/{id}', [AllImageController::class, 'photoGalleryUpdate'])->name('photo-gallery.update');



		Route::get('/video-gallery', [AllImageController::class, 'videoGallery'])->name('video-gallery');
		Route::get('/video-gallery/edit/{id}', [AllImageController::class, 'videoGalleryEdit'])->name('video-gallery-edit');
		Route::post('/video-gallery.store', [AllImageController::class, 'videoGalleryStore'])->name('video-gallery.store');
		Route::post('/video-gallery/update/{id}', [AllImageController::class, 'videoGalleryUpdate'])->name('video-gallery-update');
		Route::get('/video-gallery/destroy', [AllImageController::class, 'videoGalleryDestroy'])->name('video-gallery.destroy');

		// Faceboook Video
		Route::get('/admin-facebook-video', [AllImageController::class, 'facebookVideo'])->name('admin-facebook-video');
		Route::post('/add-facebook-video', [AllImageController::class, 'AddfacebookVideo'])->name('add-facebook-video');




        // About Us page Controller
        Route::get('/about-us-page', [AboutUsPageController::class, 'AboutContent'])->name('about-us-page');
        Route::post('/about-content-store', [AboutUsPageController::class, 'AboutContentUpdate'])->name('about-content-store');


		// Print And News Module
		Route::resource('/advertisement', AdversisementController::class);
		Route::resource('/print-media-categories', PrintNewsCategoryController::class);
		Route::resource('/archive-print-versions', ArchivePrintVersionController::class);

        Route::get('/print-and-media-news', [PrintAndNewsController::class, 'printAndNews'])->name('print-and-media-news');
        Route::post('/print-and-news/store', [PrintAndNewsController::class, 'printAndNewsStore'])->name('print-and-news.store');
        Route::get('/print-and-news/edit/{id}', [PrintAndNewsController::class, 'printAndNewsEdit'])->name('print-and-news.edit');
        Route::put('/print-and-news/update/{id}', [PrintAndNewsController::class, 'printAndNewsUpdate'])->name('print-and-news.update');
        Route::delete('/print-and-news/destroy/{id}', [PrintAndNewsController::class, 'printAndNewsDestroy'])->name('print-and-news.destroy');


		Route::resource('/comments', AdminCommentController::class);
		Route::get('/homepage-ad-view', [HomepageAdController::class,'index'])->name('homepage-ad-view');
		Route::post('/homepage-ad-store', [HomepageAdController::class, 'store'])->name('homepage-ad-store');



	});
});

Auth::routes(['register' => false]);


