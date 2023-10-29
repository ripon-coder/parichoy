<?php

namespace App\Http\Controllers\Admin;

use App\Models\PricingList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceingListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priceLists = PricingList::orderBy('id', 'DESC')->get();
        return view('admin.price-list.index')->with('priceLists', $priceLists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.price-list.create');
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
            'price'    => 'integer|required',
            'title'    => 'required',
            'content'  => 'required',
            'status'   => 'required|in:0,1',
        ]);
        $data = $request->all();
        $data['slug'] = $request->title;
        PricingList::create($data);
        return back()->with('message', 'Pricing List Content Added!!');
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
        return view('admin.price-list.edit', ['userList' => PricingList::find($id)]);
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
            'price'    => 'integer|required',
            'title'    => 'required',
            'content'  => 'required',
            'status'   => 'required|in:0,1',
        ]);

        $userList = PricingList::find($id);
        if($userList){
            $data = $request->all();
            $data['slug'] = $userList->slug;
            $userList->update($data);
        }
        return back()->with('message', 'Pricing List Content updated!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userList = PricingList::find($id);
        if($userList->delete()){
            $userList->delete();
        }
        return back();
    }
}
