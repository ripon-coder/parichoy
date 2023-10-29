<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    public function index()
    {
        return view('admin.missions.index' , ['missions' => Mission::orderBy('id', 'DESC')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.missions.create');
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
    		'icon'    => 'required',
    		'title'   => 'required',
    		'content' => 'required',
    		'url'     => 'required_if:request-type,url|nullable|url',
    		'status'  => 'required|in:0,1',
    	]);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data = Mission::create($data);
        return back()->with('message','Mission Post Inserted');
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
        return view('admin.missions.edit' ,['mission'=> Mission::find($id)]);

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
    		'icon'    => 'required',
    		'title'   => 'required',
    		'content' => 'required',
    		'url'     => 'required_if:request-type,url|nullable|url',
    		'status'  => 'required|in:0,1',
    	]);
        $data = $request->all();
        $glance = Mission::find($id);
        $data['slug'] = Str::slug($request->title);
        $glance->update($data);
        return redirect(route('admin.missions.index'))->with('message','Mission Post Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mission = Mission::find($id);
        if($mission->delete()){
            $mission->delete();
        }
        return back()->with('message','Mission Post Deleted');
    }
}
