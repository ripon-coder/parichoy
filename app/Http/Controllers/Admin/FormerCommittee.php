<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\FomerCommittee;
use App\Http\Controllers\Controller;
use File;

class FormerCommittee extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $formaerCommittees = FomerCommittee::orderBy('id', 'DESC')->get();
        return view('admin.former-committee.index', compact('formaerCommittees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.former-committee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            "image"       => "required|mimes:jpeg,jpg,png,gif|required",
            // 'description' => 'required',
            "download"    => "mimes:docx,doc,pdf",
            'status'      => 'required|boolean',
        ]);

        $data = $request->all();
        if ($formerCommitee = $request->file('download')) {
            $file_ext        = $formerCommitee->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/former-committee/";
            $destinationfull = $destination . $imagename;
            $formerCommitee->move($destination, $imagename);
            $data['download'] = $destinationfull;
        }

        if ($formerCommiteeImage = $request->file('image')) {
            $file_ext        = $formerCommiteeImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/former-committee/";
            $destinationfull = $destination . $imagename;
            $formerCommiteeImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }
        FomerCommittee::create($data);
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
        $formerCommitee = FomerCommittee::find($id);
        return view('admin.former-committee.edit', compact('formerCommitee'));
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

        $formerCommittee = FomerCommittee::find($id);
        $data    = $request->all();
        
        if ($formerCommitteeFile = $request->file('download')) {
            if (File::exists($formerCommittee->download)) {
                File::delete($formerCommittee->download);
            }
            $file_ext        = $formerCommitteeFile->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/former-committee/";
            $destinationfull = $destination . $imagename;
            $formerCommitteeFile->move($destination, $imagename);
            $data['download'] = $destinationfull;
        }

        if ($formerCommitteeImage = $request->file('image')) {
            if (File::exists($formerCommittee->image)) {
                File::delete($formerCommittee->image);
            }
            $file_ext        = $formerCommitteeImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 99999) . "." . $file_ext;
            $destination     = "upload/former-committee/";
            $destinationfull = $destination . $imagename;
            $formerCommitteeImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }
        $formerCommittee->update($data);
        return redirect(route('admin.former-committes.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $formerCommittee = FomerCommittee::find($id);

        if ($formerCommittee->delete()) {
            if (File::exists($formerCommittee->download)) {
                File::delete($formerCommittee->download);
            }

            if (File::exists($formerCommittee->image)) {
                File::delete($formerCommittee->image);
            }
        }
        $formerCommittee->delete();
        return back()->with('message', 'Your data deleted!!');
    }
}