<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneraMember;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeneralMemberAdminController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.members.index', ['allmembers' => GeneraMember::orderBy('position', 'ASC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'memberId'         => 'required',
            'name'                => 'required',
            'phone'               => 'required',
            'descriptoin'         => 'required',
            'feature_member'      => 'in:0,1',
            'general_member'      => 'in:0,1',
            'associate_member'    => 'in:0,1',
            'life_member'         => 'in:0,1',
            'departed_member'     => 'in:0,1',
            'executive_committee' => 'in:0,1',
            'position'            => 'numeric|min:0',
            'status'              => 'required|in:0,1',
            "image"               => "mimes:jpeg,jpg,png,gif,webp|required",
        ]);

        $data = $request->all();
        if ($generalMember = $request->file('image')) {
            $file_ext        = $generalMember->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/members/";
            $destinationfull = $destination . $imagename;
            $generalMember->move($destination, $imagename);
            // Image::make($productImg)->resize(270, 270)->save($medium);
            // Image::make($productImg)->resize(270, 270)->save($large);
            $data['image'] = $destinationfull;
        }

        // $member   = GeneraMember::orderBy('id', 'DESC')->first();
        // if ($member) {
        //     $memberId = $member->memberId;
        // } else {
        //     $memberId = 0;
        // }
        // $memberIDgenerate = str_pad($memberId + 1, 3, "0", STR_PAD_LEFT);

        $data['memberId'] = $request->memberId;
        $data['slug']     = Str::slug($request->name);
        $data['email ']   = strtolower($request->email);
        // $this->checkListMember($data);

        $data = GeneraMember::create($data);
        return back()->with('message', 'Member Post Inserted');
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
        $member = GeneraMember::find($id);
        $social = collect($member->social);
        return view('admin.members.edit', compact('member', 'social'));
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
            'memberId'         => 'required',
            'name'             => 'required',
            'phone'            => 'required',
            'descriptoin'      => 'required',
            'feature_member'   => 'in:0,1',
            'general_member'   => 'in:0,1',
            'associate_member' => 'in:0,1',
            'life_member'      => 'in:0,1',
            'departed_member'  => 'in:0,1',
            'position'         => 'numeric|min:0',
            'status'           => 'required|in:0,1',
            "image"            => "mimes:jpeg,jpg,png,gif,webp",
        ]);

        $data          = $request->all();
        $generalMimber = GeneraMember::find($id);
        if ($generalMember = $request->file('image')) {
            if (File::exists($generalMimber->image)) {
                File::delete($generalMimber->image);
            }
            $file_ext        = $generalMember->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/members/";
            $destinationfull = $destination . $imagename;
            $generalMember->move($destination, $imagename);

            // Image::make($productImg)->resize(270, 270)->save($medium);
            // Image::make($productImg)->resize(270, 270)->save($large);
            $data['image'] = $destinationfull;
        }

        // $member   = GeneraMember::orderBy('id', 'DESC')->first();
        // if ($member) {
        //     $memberId = $member->memberId;
        // } else {
        //     $memberId = 0;
        // }
        $data['memberId'] = $request->memberId;
        $data['slug']     = Str::slug($request->name);
        $data['email ']   = strtolower($request->email);

        $data['feature_member']   = ($request->feature_member) ?: 0;
        $data['general_member']   = ($request->general_member) ?: 0;
        $data['associate_member'] = ($request->associate_member) ?: 0;
        $data['life_member']      = ($request->life_member) ?: 0;
        $data['departed_member']  = ($request->departed_member) ?: 0;

        $generalMimber->update($data);
        return redirect(route('admin.general-member.index'))->with('message', 'Members Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $members = GeneraMember::find($id);
        if ($members->delete()) {
            if (File::exists($members->image)) {
                File::delete($members->image);
            }
        }
        $members->delete();
        return back()->with('message', 'Members Post Deleted');
    }

    public function memberReOrder(Request $request) {
        if ($request->update) {
            foreach ($request->positions as $position) {
                $commitiID   = $position[0];
                $newPosition = $position[1];

                GeneraMember::where('id', $commitiID)->update([
                    'id'       => $commitiID,
                    'position' => $newPosition,
                ]);
            }

            session()->flash('message', 'Your possiotion has been updated!!');
            exit();
        }

    }

}
