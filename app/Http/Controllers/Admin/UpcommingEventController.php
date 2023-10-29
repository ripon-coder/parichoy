<?php

namespace App\Http\Controllers\Admin;

use App\Models\UpcommingEvents;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpcommingEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.upcomming-event.index' , ['allevents' => UpcommingEvents::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.upcomming-event.create');
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
    		'eventTitle'    => 'required',
    		'eventTitme'    => 'required',
    		'eventDate'     => 'required',
    		'eventMonth'    => 'required',
    		'eventLocation' => 'required',
    		'status'        => 'required|in:0,1',
    	]);
        UpcommingEvents::create($request->all());
        return back()->with('message','Upcomming Event Post Inserted');
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
        return view('admin.upcomming-event.edit' ,[ 'upcomingevent'=> UpcommingEvents::find($id)]);

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
    		'eventTitle'    => 'required',
    		'eventTitme'    => 'required',
    		'eventDate'     => 'required',
    		'eventMonth'    => 'required',
    		'eventLocation' => 'required',
    		'status'        => 'required|in:0,1',
    	]);
        $upcommingevent = UpcommingEvents::find($id);
        $upcommingevent->update($request->all());
        return redirect(route('admin.upcomming-event.index'))->with('message','Upcomming Event Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upcommingevent = UpcommingEvents::find($id);
        if($upcommingevent->delete()){
           $upcommingevent->delete();
        }

        return back()->with('message','Upcomming Event Post Update');
    }
}
