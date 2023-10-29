<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdvisorCommittee;
use File;
use Illuminate\Http\Request;

class AdvisorCommitteeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $advisors = AdvisorCommittee::orderBy('id', 'DESC')->get();
        return view('admin.advisor.index', compact('advisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.advisor.create');
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
            // 'description' => 'required',
            "download"    => "mimes:docx,doc,pdf",
            'status'      => 'required|boolean',
        ]);

        $data = $request->all();
        if ($advisorFile = $request->file('download')) {
            $file_ext        = $advisorFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/advisor-committee/";
            $destinationfull = $destination . $imagename;
            $advisorFile->move($destination, $imagename);
            $data['download'] = $destinationfull;
        }

        if ($advisorImage = $request->file('image')) {
            $file_ext        = $advisorImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/advisor-committee/";
            $destinationfull = $destination . $imagename;
            $advisorImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }
        AdvisorCommittee::create($data);
        return back()->with('message', 'Your Data Stored!!');

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
        $advisor = AdvisorCommittee::find($id);
        return view('admin.advisor.edit', compact('advisor'));
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
            // 'description' => 'required',
            "download"    => "mimes:docx,doc,pdf",
            'status'      => 'required|boolean',
        ]);

        $advisor = AdvisorCommittee::find($id);
        $data    = $request->all();
        
        if ($advisorFile = $request->file('download')) {
            if (File::exists($advisor->download)) {
                File::delete($advisor->download);
            }
            $file_ext        = $advisorFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/advisor-committee/";
            $destinationfull = $destination . $imagename;
            $advisorFile->move($destination, $imagename);
            $data['download'] = $destinationfull;
        }

        if ($advisorImage = $request->file('image')) {
            if (File::exists($advisor->image)) {
                File::delete($advisor->image);
            }
            $file_ext        = $advisorImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/advisor-committee/";
            $destinationfull = $destination . $imagename;
            $advisorImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }
        $advisor->update($data);
        return redirect(route('admin.advisor-committee.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $advisor = AdvisorCommittee::find($id);

        if ($advisor->delete()) {
            if (File::exists($advisor->download)) {
                File::delete($advisor->download);
            }

            if (File::exists($advisor->image)) {
                File::delete($advisor->image);
            }
        }
        $advisor->delete();
        return back()->with('message', 'Your data deleted!!');
    }
}
