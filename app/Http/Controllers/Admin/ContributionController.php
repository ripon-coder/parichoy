<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contribution;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contributions.index' , ['contributions' => Contribution::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contributions.create');
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
    		'subtitle' => 'required',
    		'title' => 'required',
            'content' => 'required',
            'url' => 'url',
    		'status' => 'required|in:0,1',
            "donate_one" => "mimes:jpeg,jpg,png,gif|required",
            "donate_tow" => "mimes:jpeg,jpg,png,gif|required",
    	]);
        $data = $request->all();
        if($donate_one = $request->file('donate_one')){
            $file_ext        = $donate_one->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/contributions/donate-one/".$imagename;
            Image::make($donate_one)->resize(390, 290)->save($destination);
            $data['donate_one'] = $destination;

            //$destinationfull = $destination.$imagename;
            //$glanceimage->move($destination, $imagename);
        }

        if($donate_two = $request->file('donate_tow')){
            $file_ext        = $donate_two->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/contributions/donate-two/".$imagename;
            Image::make($donate_two)->resize(390, 290)->save($destination);
            $data['donate_tow'] = $destination;

            //$destinationfull = $destination.$imagename;
            //$glanceimage->move($destination, $imagename);
        }
        $data['slug'] = Str::slug($request->title);
        $data = Contribution::create($data);
        return back()->with('message','Contributions Post Inserted');
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
        return view('admin.contributions.edit' ,['contribution'=> Contribution::find($id)]);

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
    		'subtitle' => 'required',
    		'title' => 'required',
            'content' => 'required',
            'url' => 'url',
            'status' => 'required|in:0,1',
    	]);
        $data = $request->all();
        $contribution = Contribution::find($id);


        if($donate_one = $request->file('donate_one')){
            if (File::exists($contribution->donate_one)) {
                File::delete($contribution->donate_one);
            }
            $file_ext        = $donate_one->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/contributions/donate-one/".$imagename;
            Image::make($donate_one)->resize(390, 290)->save($destination);
            $data['donate_one'] = $destination;

            //$destinationfull = $destination.$imagename;
            //$glanceimage->move($destination, $imagename);
        }

        if($donate_two = $request->file('donate_tow')){
            if (File::exists($contribution->donate_tow)) {
                File::delete($contribution->donate_tow);
            }
            $file_ext        = $donate_two->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999).".".$file_ext;
            $destination     = "upload/contributions/donate-two/".$imagename;
            Image::make($donate_two)->resize(390, 290)->save($destination);
            $data['donate_tow'] = $destination;

            //$destinationfull = $destination.$imagename;
            //$glanceimage->move($destination, $imagename);
        }

        $data['slug'] = Str::slug($request->title);
        $contribution->update($data);
        return redirect(route('admin.contributions.index'))->with('message','Contribution Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contribution = Contribution::find($id);
        if($contribution->delete()){
            if (File::exists($contribution->donate_one)) {
                File::delete($contribution->donate_one);
            }
            if (File::exists($contribution->donate_tow)) {
                File::delete($contribution->donate_tow);
            }
        }
        $contribution->delete();
        return back()->with('message','Contribution Post Deleted');
    }
}
