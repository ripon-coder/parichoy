<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SubscribeUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\ExpiredSubscriptionMail;
use File;

class SubscribesUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subscribe-user.index',[
            'allusers' => SubscribeUser::orderBy('id', 'DESC')->get()
        ]);
    }

    public function expiredUser()
    {
        return view('admin.subscribe-user.expired-user',[
            'allusers' => SubscribeUser::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.subscribe-user.view',['user' => SubscribeUser::find($id)]);
    }


    public function ExpiredUser_Mail_Notify($id)
    {
        $subscribeuser  = SubscribeUser::find($id);
        return view('admin.subscribe-user.subscription-mail-notifify',[
            'subscribeuser' => $subscribeuser
        ]);
    }

    public function Expired_User_Send_Mail(Request $request)
    {
        $mailData = $request->all();
        Mail::to($request->email)->queue(new ExpiredSubscriptionMail($mailData));
        return back()->with('message','A mail has been send');
    }

    public function Subscribe_Status_Update($id = ''){

        $subscribeUser = SubscribeUser::find($id);
        if($subscribeUser->status === 0){
            $status = $subscribeUser->status = 1;
        }else{
            $status = $subscribeUser->status = 0;
        }

        $subscribeUser->update([
            'status' => $status
        ]);

        return back()->with('message' , 'Subscribe status updated!!');;

    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.subscribe-user.edit',['user' => SubscribeUser::find($id)]);
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
        $data = $request->all();
        $subscripbeUser = SubscribeUser::find($id);
        $subscripbeUser->update($data);
       return redirect(route('admin.subscribe-user.index'))->with('message' , 'Subscribe user updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscribeUser = SubscribeUser::find($id);
        if($subscribeUser->delete()){
            if (File::exists($subscribeUser->profile_img)) {
                File::delete($subscribeUser->profile_img);
            }
        }

        $subscribeUser->delete();
        return back()->with('message','Subscribe user deleted successfully!');
    }
}
