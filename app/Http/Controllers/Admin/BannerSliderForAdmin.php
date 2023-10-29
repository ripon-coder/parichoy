<?php

namespace App\Http\Controllers\Admin;

use App\Models\BannerSlide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BannerSliderForAdmin extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerSliders = BannerSlide::orderBy('id', 'DESC')->get();
        return view('admin.banner-slider.index', [
            'bannerSliders' => $bannerSliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    		"banner_img" => "required|array",
            "banner_img.*" => "mimes:jpeg,jpg,png,gif|required",
    	]);

        if($bannerImage = $request->file('banner_img')){
            foreach($request->banner_img as $key => $image){
                $bannerImage = $request->file('banner_img')[$key];
                $file_ext        = $bannerImage->getClientOriginalExtension();
                $imagename       = mt_rand(111, 999999).".".$file_ext;
                $destination     = "upload/banner-slider/";
                $destinationfull = $destination.$imagename;
                $bannerImage->move($destination, $imagename);

                BannerSlide::create([
                    'banner_img' => $destinationfull,
                    'first_banner' => $request->first_banner,
                    'second_banner' => $request->second_banner
                ]);
            }
        }
        return back()->with('message','Data Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bannerSlider = BannerSlide::find($id);
        if($bannerSlider->delete()){
            if (File::exists($bannerSlider->banner_img)) {
                File::delete($bannerSlider->banner_img);
            }
        }

        $bannerSlider->delete();
        return back()->with('message','Members Message Deleted');
    }
}
