<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpcommingNotice extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.notices.index' , ['notices' => Notice::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notices.create');
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
    		'noticeTitle'       => 'required',
    		'noticeTitme'       => 'required',
    		'noticeDate'        => 'required',
    		'noticeMonth'       => 'required',
    		'noticeLocation'     => 'required',
    		'noticeLocation'    => 'required',
    		'noticeDescription' => 'required',
    		'status'            => 'required|in:0,1',
    	]);
        Notice::create($request->all());
        return back()->with('message','Notice Inserted');
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
        return view('admin.notices.edit' ,[ 'notice'=> Notice::find($id)]);

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
    		'noticeTitle'       => 'required',
    		'noticeTitme'       => 'required',
    		'noticeDate'        => 'required',
    		'noticeMonth'       => 'required',
    		'noticeLocation'    => 'required',
    		'noticeLocation'    => 'required',
    		'noticeDescription' => 'required',
    		'status'            => 'required|in:0,1',
    	]);
        $notice = Notice::find($id);
        $notice->update($request->all());
        return redirect(route('admin.notices.index'))->with('message','Notice Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notice = Notice::find($id);
        if($notice->delete()){
           $notice->delete();
        }

        return back()->with('message','Notice Update');
    }
}
