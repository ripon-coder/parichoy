<?php

namespace App\Http\Controllers\Admin;

use App\Models\AtGlance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
class AtGlanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.at-glance.index' , ['allglance' => AtGlance::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.at-glance.create');
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
    		'desc' => 'required',
    		'status' => 'required|in:0,1',
            "logo" => "mimes:jpeg,jpg,png,gif|required",
    	]);
        $data = $request->all();
        if($glanceimage = $request->file('logo')){
            $file_ext        = $glanceimage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/at-glance/";
            $destinationfull = $destination.$imagename;
            $glanceimage->move($destination, $imagename);

            // Image::make($productImg)->resize(270, 270)->save($medium);
            // Image::make($productImg)->resize(270, 270)->save($large);
            $data['logo'] = $destinationfull;
        }
        $data['slug'] = Str::slug($request->title);
        $data = AtGlance::create($data);
        return back()->with('message','Glance Post Inserted');
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
        return view('admin.at-glance.edit' ,[ 'glance'=> AtGlance::find($id)]);

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
    		'desc' => 'required',
    		'status' => 'required|in:0,1'
        ]);
        $data = $request->all();
        $glance = AtGlance::find($id);
        if($glanceimage = $request->file('logo')){
            if (File::exists($glance->logo)) {
                File::delete($glance->logo);
            }
            $file_ext        = $glanceimage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/at-glance/";
            $destinationfull = $destination.$imagename;
            $glanceimage->move($destination, $imagename);

            // Image::make($productImg)->resize(270, 270)->save($medium);
            // Image::make($productImg)->resize(270, 270)->save($large);
            $data['logo'] = $destinationfull;
        }
        $data['slug'] = Str::slug($request->title);
        $glance->update($data);
        return redirect(route('admin.at-glance.index'))->with('message','Glance Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $glance = AtGlance::find($id);
        if($glance->delete()){
            if (File::exists($glance->logo)) {
                File::delete($glance->logo);
            }
        }
        $glance->delete();
        return back()->with('message','Glance Post Deleted');
    }
}
