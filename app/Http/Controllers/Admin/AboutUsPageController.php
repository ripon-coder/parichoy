<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsModel;
use File;
use Illuminate\Http\Request;

class AboutUsPageController extends Controller {
    public function AboutContent() {
        return view('admin.about-us-page.edit', [
            'aboutContent' => AboutUsModel::first(),
        ]);
    }

    public function AboutContentUpdate(Request $request) {
        $request->validate([
            'title'    => 'required',
            'content'  => 'required',
            "imageOne" => "mimes:jpeg,jpg,png,gif,webp",
        ]);

        $data    = $request->all();
        $aboutus = AboutUsModel::first();

        if ($aboutus) {
            if ($aboutimageOne = $request->file('imageOne')) {
                if (!empty($aboutus->imageOne) && $aboutus->imageOne !== NULL) {
                    if (file_exists($aboutus->imageOne)) {
                        File::delete($aboutus->imageOne);
                    }
                }
                $file_ext        = $aboutimageOne->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/about-page/";
                $destinationfull = $destination . $imagename;
                $aboutimageOne->move($destination, $imagename);
                $data['imageOne'] = $destinationfull;
            }

            $aboutus->update($data);
            return redirect(route('admin.about-us-page'))->with('success', 'About page content updated!!');
        } else {

            if ($aboutimageOne = $request->file('imageOne')) {
                $file_ext        = $aboutimageOne->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999) . "." . $file_ext;
                $destination     = "upload/about-page/";
                $destinationfull = $destination . $imagename;
                $aboutimageOne->move($destination, $imagename);
                $data['imageOne'] = $destinationfull;
            }

            AboutUsModel::create($data);
            return redirect(route('admin.about-us-page'))->with('success', 'About page content inserted successfully!!');
        }

    }
}
