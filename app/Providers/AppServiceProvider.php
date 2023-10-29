<?php

namespace App\Providers;

use App\Models\State;
use App\Models\AboutUs;
use App\Models\Category;
use App\Models\AboutUsModel;
use App\Models\PhotoGallery;
use App\Models\VideoGallery;
use App\Models\VisitorCount;

use Illuminate\Support\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);

        Paginator::useBootstrap();

        View::composer(['*'], function ($view) {

            $aboutUs          = AboutUs::first();
            $aboutUs_page     = AboutUsModel::first();
            $photoGalleryData = PhotoGallery::orderBy('id', 'desc')->paginate(30);
            $videoGalleryData = VideoGallery::orderBy('id', 'desc')->paginate(8);
            $states           = State::get();

            $menuCategories = Category::where('position', '!=', NULL)->orderBy('position', 'ASC')->with('subCategories')->take(11)->get();

            $view->with([
                'g_about_us'           => $aboutUs,
                'g_aboutUs_page'       => $aboutUs_page,
                'g_photo_gallery_data' => $photoGalleryData,
                'g_video_gallery_data' => $videoGalleryData,
                'states'               => $states,
                'menuCategories'       => $menuCategories,

                'bangladesh'           => $this->Get_Category_By_ID(10),
                'community'            => $this->Get_Category_By_ID(8),
                'rest_of_world'        => $this->Get_Category_By_ID(9),
                'juktorastra'          => $this->Get_Category_By_ID(11),

                'art_literature'       => $this->Get_Category_By_ID(23),
                'entertainment'        => $this->Get_Category_By_ID(3),
                'technology'           => $this->Get_Category_By_ID(24),
                'politics'             => $this->Get_Category_By_ID(26),
            ]);

            // Visitor Count Save
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            } else if (isset($_SERVER['HTTP_FORWARDED'])) {
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            } else if (isset($_SERVER['REMOTE_ADDR'])) {
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            } else {
                $ipaddress = 'UNKNOWN';
            }
            if ($ipaddress == 'UNKNOWN' || $ipaddress == '::1' || $ipaddress == '127.0.0.1:8000') {
            } else {
                $hasVisited = VisitorCount::where('ip', $ipaddress)->where('date', date('Y-m-d'))->first();
                if (!$hasVisited) {
                    VisitorCount::firstOrCreate([
                        'ip'   => $ipaddress,
                        'date' => date('Y-m-d'),
                    ])->save();
                }
            }
            // Visitor Count View
            $todaysVisitors  = VisitorCount::where('date', Carbon::today())->count();
            $weeklyVisitors  = VisitorCount::where('date', '>', Carbon::now()->startOfWeek())->where('date', '<', Carbon::now()->endOfWeek())->count();
            $monthlyVisitors = VisitorCount::whereMonth('date', date('m'))->whereYear('date', date('Y'))->count();
            $totalVisitors   = VisitorCount::count();

            $view->with([
                'g_todays_visitors'  => $todaysVisitors,
                'g_weekly_visitors'  => $weeklyVisitors,
                'g_monthly_visitors' => $monthlyVisitors,
                'g_total_visitors'   => $totalVisitors,
            ]);
        });
    }

    protected function Get_Category_By_ID($id) {
        return Category::where(['status' => 1, 'id' => $id])->with('posts')->first();
    }
}
