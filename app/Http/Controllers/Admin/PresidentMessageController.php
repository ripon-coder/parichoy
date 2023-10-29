<?php

namespace App\Http\Controllers\Admin;

use App\Models\President;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class PresidentMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.message-member.index',[
            'allmessages' => President::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.message-member.create');
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
            'name'           => 'required',
            'address'        => 'required',
            'designation'    => 'required',
            'status'         => 'required|in:0,1',
            'message_status' => 'in:0,1',
            "profile_pic"    => "mimes:jpeg,jpg,png,gif,webp",
        ]);

        $data = $request->all();

        if($memberImage = $request->file('profile_pic')){
            $file_ext        = $memberImage->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999).".".$file_ext;
            $destination     = "upload/members-message/";
            $destinationfull = $destination.$imagename;
            $memberImage->move($destination, $imagename);
            $data['profile_pic'] = $destinationfull;
        }

        $existanceData = President::where([
            'message_status' => $request->message_status
            ])->first();

        if($existanceData){
            $existanceData->update($data);
        }else{
            President::create( $data );
        }
        return back()->with('message', 'Your message has been published!!');

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
        return view('admin.message-member.edit', ['member' => President::find($id)]);
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
        // $request->validate([
        //     'address'        => 'required',
        //     'designation'    => 'required',
        //     'status'         => 'required|in:0,1',
        //     'message_status' => 'in:0,1',
        //     "profile_pic"    => "mimes:jpeg,jpg,png,gif,webp",
        // ]);

        // $data = $request->all();
        // $member = President::find($id);
        // if($memberImage = $request->file('profile_pic')){
        //     if (File::exists($member->profile_pic)) {
        //         File::delete($member->profile_pic);
        //     }
        //     $file_ext        = $memberImage->getClientOriginalExtension();
        //     $imagename       = mt_rand(111, 999999).".".$file_ext;
        //     $destination     = "upload/members-message/";
        //     $destinationfull = $destination.$imagename;
        //     $memberImage->move($destination, $imagename);
        //     $data['profile_pic'] = $destinationfull;
        // }

        // $data['message_status'] = ($request->secretary_message) ?: 0;
        // $member->update($data);
        // return redirect(route('admin.message-member.index'))->with('message', 'Your message has been updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        $member = President::find($id);
        if($member->delete()){
            if (File::exists($member->profile_pic)) {
                File::delete($member->profile_pic);
            }
        }

        $member->delete();
        return back()->with('message','Members Message Deleted');
    }

}
