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

            if ($ADimage = $request->file('ad_1')) {
                if (File::exists($homepageAD->ad_1)) {
                    File::delete($homepageAD->ad_1);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_1'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_2')) {
                if (File::exists($homepageAD->ad_2)) {
                    File::delete($homepageAD->ad_2);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_2'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_3')) {
                if (File::exists($homepageAD->ad_3)) {
                    File::delete($homepageAD->ad_3);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_3'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_4')) {
                if (File::exists($homepageAD->ad_4)) {
                    File::delete($homepageAD->ad_4);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_4'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_5')) {
                if (File::exists($homepageAD->ad_5)) {
                    File::delete($homepageAD->ad_5);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_5'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_6')) {
                if (File::exists($homepageAD->ad_6)) {
                    File::delete($homepageAD->ad_6);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_6'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_7')) {
                if (File::exists($homepageAD->ad_7)) {
                    File::delete($homepageAD->ad_7);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_7'] = $destinationfull;
            }
            if ($ADimage = $request->file('ad_8')) {
                if (File::exists($homepageAD->ad_8)) {
                    File::delete($homepageAD->ad_8);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_8'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_9')) {
                if (File::exists($homepageAD->ad_9)) {
                    File::delete($homepageAD->ad_9);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_9'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_10')) {
                if (File::exists($homepageAD->ad_10)) {
                    File::delete($homepageAD->ad_10);
                }
                
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_10'] = $destinationfull;
            }
            $homepageAD->update($data);

            $message = "Your AD Update!!";
        } else {
            if ($ADimage = $request->file('ad_1')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_1'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_2')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_2'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_3')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_3'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_4')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_4'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_5')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_5'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_6')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_6'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_7')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_7'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_8')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_8'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_9')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_9'] = $destinationfull;
            }

            if ($ADimage = $request->file('ad_10')) {
                $file_ext        = $ADimage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/homepage-ad";
                $destinationfull = "upload/homepage-ad/" . $imagename;
                $ADimage->move($destination, $imagename);
                $data['ad_10'] = $destinationfull;
            }
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
            return $data[$image] = $destinationfull;
        }
    }

}
