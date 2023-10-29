<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\HomeIntro;
use Illuminate\Http\Request;
use File;

class AboutUsController extends Controller {
    public function create() {
        $aboutUsData = AboutUs::first();
        return view('admin.about-us.create')->with('about_us_data', $aboutUsData);
    }

    public function store(Request $request) {
        $data = $request->all();
        $aboutUsData = AboutUs::first();
        if ($aboutUsData) {
            
            if ($image = $request->file('profile_pic')) {
                if (File::exists($aboutUsData->profile_pic)) {
                    File::delete($aboutUsData->profile_pic);
                }
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['profile_pic'] = $fullPath;
            }
            if ($image = $request->file('dashboard_image')) {
                if (File::exists($aboutUsData->dashboard_image)) {
                    File::delete($aboutUsData->dashboard_image);
                }
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['dashboard_image'] = $fullPath;
            }

            if ($image = $request->file('header_logo')) {
                if (File::exists($aboutUsData->header_logo)) {
                    File::delete($aboutUsData->header_logo);
                }
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['header_logo'] = $fullPath;
            }

            if ($image = $request->file('favicon_icon')) {
                if (File::exists($aboutUsData->favicon_icon)) {
                    File::delete($aboutUsData->favicon_icon);
                }
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['favicon_icon'] = $fullPath;
            }

            if ($image = $request->file('footer_logo')) {
                if (File::exists($aboutUsData->footer_logo)) {
                    File::delete($aboutUsData->footer_logo);
                }
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['footer_logo'] = $fullPath;
            }

            $aboutUsData->update($data);
            return back()->with('message', 'Data Updated!!');
        }else{
            if ($image = $request->file('profile_pic')) {
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['profile_pic'] = $fullPath;
            }
            if ($image = $request->file('dashboard_image')) {
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['dashboard_image'] = $fullPath;
            }

            if ($image = $request->file('header_logo')) {
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['header_logo'] = $fullPath;
            }

            if ($image = $request->file('favicon_icon')) {
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['favicon_icon'] = $fullPath;
            }

            if ($image = $request->file('footer_logo')) {
                $imageExt        = substr(md5(time()), 0, 10) . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'upload/about-us-image/';
                $fullPath        = $destinationPath . $imageExt;
                $image->move($destinationPath, $imageExt);
                $data['footer_logo'] = $fullPath;
            }

            AboutUs::create($data);
            return back()->with('message', 'Data Updated');

        }

              
        
    }

    public function homeIntro() {
        $homeIntroData = HomeIntro::first();
        return view('admin.home-intro.create')->with('home_intro_data', $homeIntroData);
    }

    public function homeIntroStore(Request $request) {
        // / print_r($request->all()) ;
        // / exit();
        $homeIntroData = HomeIntro::first();
        if ($homeIntroData) {
            if ($request->image) {
                if ($homeIntroData->image != '' && $homeIntroData->image != null) {
                    $file_old = base_path() . '/' . $homeIntroData->image;
                    $file_old = public_path().'/'.$imageExistance->image;
                    unlink($file_old);
                }
                $coverPhoto   = $request->image;
                $getExt       = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_' . time() . '_' . uniqid() . '.' . $getExt;
                $destination  = 'upload/home-intro-image/';
                $image        = $destination . $modifiedName;
                $coverPhoto->move($destination, $modifiedName);

                $homeIntroData->update([
                    'instra_link'  => $request->instra_link,
                    'fb_link'      => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'youtube_link' => $request->youtube_link,
                    'google_link'  => $request->google_link,
                    'designation'  => $request->designation,
                ]);
            } else {
                $homeIntroData->update([
                    'instra_link'  => $request->instra_link,
                    'fb_link'      => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'youtube_link' => $request->youtube_link,
                    'google_link'  => $request->google_link,
                    'designation'  => $request->designation,
                ]);
            }
        } else {
            if ($request->image) {
                $coverPhoto   = $request->image;
                $getExt       = $coverPhoto->getClientOriginalExtension();
                $modifiedName = 'img_' . time() . '_' . uniqid() . '.' . $getExt;
                $destination  = 'upload/about-us-image/';
                $image        = $destination . $modifiedName;
                $coverPhoto->move($destination, $modifiedName);

                HomeIntro::create([
                    'instra_link'  => $request->instra_link,
                    'fb_link'      => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'youtube_link' => $request->youtube_link,
                    'google_link'  => $request->google_link,
                    'designation'  => $request->designation,
                ]);
            } else {
                HomeIntro::create([
                    'instra_link'  => $request->instra_link,
                    'fb_link'      => $request->fb_link,
                    'twitter_link' => $request->twitter_link,
                    'youtube_link' => $request->youtube_link,
                    'google_link'  => $request->google_link,
                    'designation'  => $request->designation,
                    'phone'        => $request->phone,
                    'email'        => $request->email,
                    'address'      => $request->address,
                ]);
            }
        }
        return back()->with('message', 'Data Updated');
    }
}
