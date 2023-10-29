<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ImportantLink;
use App\Http\Controllers\Controller;

class ImportantLinks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $importantsLinks = ImportantLink::orderBy('id', 'DESC')->get();
        return view('admin.important-links.index', ['importantsLinks' =>  $importantsLinks]);
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
        $request->validate([
    		'link_heading' => 'required',
    		'link'         => 'required',
    	]);
        ImportantLink::create($request->all());
        return back()->with('message','Data Inserted');

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
        $importantLink = ImportantLink::find($id);
    	if($importantLink){
    		return view('admin.important-links.edit', compact('importantLink'));
    	}else{
    		return back()->with('error', 'Data Not Found');
    	}
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
        $importantLink = ImportantLink::find($id);
        $data = $request->all();

        $request->validate([
    		'link_heading' => 'required',
    		'link'         => 'required',
    	]);

        $importantLink->update($data);
        return redirect(route('admin.important-links.index'))->with('message','Data Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $importantLink = ImportantLink::find($id);
        if($importantLink){
            $importantLink->delete();
        }
        return back()->with('message', 'Data has been deleted!!');
    }
}
