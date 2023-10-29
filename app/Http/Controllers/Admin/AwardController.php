<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Award;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awards = Award::orderBy('id', 'DESC')->get();
        return view('admin.award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.award.create');
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
            "image"       => "required|mimes:jpeg,jpg,png,gif",
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|boolean',
        ]);

        $data = $request->all();
        if ($awardImage = $request->file('image')) {
            $file_ext        = $awardImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/award-image/";
            $destinationfull = $destination . $imagename;
            $awardImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }
        $data['slug'] = Str::slug($request->title).'-'.uniqid();

        Award::create($data);
        return back()->with('message', 'Your Data Stored!!');
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
        $award = Award::find($id);
        return view('admin.award.edit', compact('award'));
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
            "image"       => "mimes:jpeg,jpg,png,gif",
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|boolean',
        ]);

        $data = $request->all();
        $award = Award::find($id);
        if ($awardImage = $request->file('image')) {
            if (File::exists($award->image)) {
                File::delete($award->image);
            }
            $file_ext        = $awardImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/award-image/";
            $destinationfull = $destination . $imagename;
            $awardImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }
        $data['slug'] = Str::slug($request->title).'-'.uniqid();

        $award->update($data);
        return redirect(route('admin.awards.index'))->with('message', 'Your Data Stored!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $award = Award::find($id);
        if($award->delete()){
            if (File::exists($award->image)) {
                File::delete($award->image);
            }
        }
        $award->delete();
        return back()->with('message','Glance Post Deleted');
    }
}
