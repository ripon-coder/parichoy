<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroSlider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.hero-slider.index' , ['herosliders' => HeroSlider::where('status', 1)->orderBy('id', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hero-slider.create');
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
    		'title' => 'required',
    		'status' => 'required|in:0,1',
            "image" => "mimes:jpeg,jpg,png,gif|required",
    	]);
        $data = $request->all();
        if($slider = $request->file('image')){
            $file_ext        = $slider->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/slider/";
            $destinationfull = $destination.$imagename;
            $slider->move($destination, $imagename);
            $data['image'] = $destinationfull;

        }
        // $data['slug'] = Str::slug($request->title);
        $data = HeroSlider::create($data);
        return back()->with('message','Slider Post Inserted');
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
        return view('admin.hero-slider.edit' ,['heroslider'=> HeroSlider::find($id)]);

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
        $request->validate([
            'title' => 'required',
            'status' => 'required|in:0,1',
            "image" => "mimes:jpeg,jpg,png,gif",
        ]);
        $data = $request->all();
        $sliderData = HeroSlider::find($id);

        if($slider = $request->file('image')){
            if(isset($sliderData->image)){
                if (File::exists($sliderData->image)) {
                    File::delete($sliderData->image);
                }
            }

            $file_ext        = $slider->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/slider/";
            $destinationfull = $destination.$imagename;
            $slider->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        // $data['slug'] = Str::slug($request->title);
        $sliderData->update($data);
        return redirect(route('admin.hero-slider.index'))->with('message','Slider Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = HeroSlider::find($id);
        if($slider->delete()){
            if (File::exists($slider->image)) {
                File::delete($slider->image);
            }
        }
        $slider->delete();
        return back()->with('message','Slider Post Deleted');
    }
}
