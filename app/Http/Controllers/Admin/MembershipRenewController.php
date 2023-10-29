<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RenewMemberShip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MembershipRenewController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.renew-membership.index', ['allrenews' => RenewMemberShip::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.renew-membership.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'title'           => 'required',
            'content'         => 'required',
            'benifit_content' => 'required',
            'status'          => 'required|in:0,1',
            "image"           => "mimes:jpeg,jpg,png,gif|required",
        ]);

        $data = $request->all();
        if ($renewImage = $request->file('image')) {
            $file_ext        = $renewImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/member-renew/";
            $destinationfull = $destination . $imagename;
            $renewImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        foreach ($request->benifit_content as $key => $benifitItem) {
            $data['benifit_content'][$key] = $benifitItem;
        }

        $data = RenewMemberShip::create($data);
        return back()->with('message', 'Renew Post Inserted');
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
        return view('admin.renew-membership.edit', ['renewmember' => RenewMemberShip::find($id)]);

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
            'title'   => 'required',
            'content' => 'required',
            'status'  => 'required|in:0,1',
        ]);
        $data        = $request->all();
        $renewMember = RenewMemberShip::find($id);
        if ($renewImage = $request->file('image')) {
            if (File::exists($renewMember->image)) {
                File::delete($renewMember->image);
            }
            $file_ext        = $renewImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/member-renew/";
            $destinationfull = $destination . $imagename;
            $renewImage->move($destination, $imagename);
            $data['image'] = $destinationfull;
        }

        $renewMember->update($data);
        return redirect(route('admin.membership-renew.index'))->with('message', 'Renew Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $renewMember = RenewMemberShip::find($id);
        if ($renewMember->delete()) {
            if (File::exists($renewMember->image)) {
                File::delete($renewMember->image);
            }
        }
        $renewMember->delete();
        return back()->with('message', 'Renew Post Deleted');
    }

}
