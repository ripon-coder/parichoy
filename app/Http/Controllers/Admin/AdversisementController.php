<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use File;

class AdversisementController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $allAdvertisements = Advertisement::orderBy('id', 'DESC')->get();
        return view('admin.advertisement.index', compact('allAdvertisements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            "image"       => "required|mimes:jpeg,jpg,png,gif",
        ]);

        $data = $request->all();
        if ($advisorFile = $request->file('image')) {
            $file_ext        = $advisorFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/advertisement/";
            $destinationfull = $destination . $imagename;
            $advisorFile->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        Advertisement::create($data);
        return back()->with('message', 'Your Advertise Inserted!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $advertise = Advertisement::find($id);
        return view('admin.advertisement.edit', compact('advertise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            "image"       => "mimes:jpeg,jpg,png,gif",
        ]);

        $advertise = Advertisement::find($id);

        $data = $request->all();
        if ($advisorFile = $request->file('image')) {
            if (File::exists($advertise->download)) {
                File::delete($advertise->download);
            }
            $file_ext        = $advisorFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/advertisement/";
            $destinationfull = $destination . $imagename;
            $advisorFile->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        $advertise->update($data);
        return back()->with('message', 'Your Advertise Updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
