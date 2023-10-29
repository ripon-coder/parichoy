<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageAd;
use Illuminate\Http\Request;
use File;

class HomepageAdController extends Controller {
    public function index() {
        $homepageAD = HomepageAd::first();
        if ($homepageAD) {
            return view('admin.homepage-ad.edit', compact('homepageAD'));
        } else {
            return view('admin.homepage-ad.edit');
        }
    }

    public function store(Request $request) {

        $homepageAD = HomepageAd::first();

        $data = $request->all();

        if ($homepageAD) {

            $data['ad_1']  = $this->updateImage($request, 'ad_1');
            $data['ad_2']  = $this->updateImage($request, 'ad_2');
            $data['ad_3']  = $this->updateImage($request, 'ad_3');
            $data['ad_4']  = $this->updateImage($request, 'ad_4');
            $data['ad_5']  = $this->updateImage($request, 'ad_5');
            $data['ad_6']  = $this->updateImage($request, 'ad_6');
            $data['ad_7']  = $this->updateImage($request, 'ad_7');
            $data['ad_8']  = $this->updateImage($request, 'ad_8');
            $data['ad_9']  = $this->updateImage($request, 'ad_9');
            $data['ad_10'] = $this->updateImage($request, 'ad_10');
            $homepageAD->update($data);

            $message = "Your AD Update!!";
        } else {
            $data['ad_1']  = $this->uploadImage($request, 'ad_1');
            $data['ad_2']  = $this->uploadImage($request, 'ad_2');
            $data['ad_3']  = $this->uploadImage($request, 'ad_3');
            $data['ad_4']  = $this->uploadImage($request, 'ad_4');
            $data['ad_5']  = $this->uploadImage($request, 'ad_5');
            $data['ad_6']  = $this->uploadImage($request, 'ad_6');
            $data['ad_7']  = $this->uploadImage($request, 'ad_7');
            $data['ad_8']  = $this->uploadImage($request, 'ad_8');
            $data['ad_9']  = $this->uploadImage($request, 'ad_9');
            $data['ad_10'] = $this->uploadImage($request, 'ad_10');

            HomepageAd::create($data);

            $message = "Your AD Updated!!";
        }

        return back()->with('message', $message);

    }

    public function uploadImage($request, $image) {

        if ($ADimage = $request->file($image)) {
            $file_ext        = $ADimage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/homepage-ad";
            $destinationfull = "upload/homepage-ad/" . $imagename;
            $ADimage->move($destination, $imagename);
            return $requestData[$image] = $destinationfull;
        }
    }

    public function updateImage($request, $image) {

        $homepageAD = HomepageAd::first();
        if ($ADimage = $request->file($image)) {
            if (File::exists($homepageAD->$image)) {
                File::delete($homepageAD->$image);
            }
            
            $file_ext        = $ADimage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/homepage-ad";
            $destinationfull = "upload/homepage-ad/" . $imagename;
            $ADimage->move($destination, $imagename);
            return $destinationfull;
        }
    }

}
