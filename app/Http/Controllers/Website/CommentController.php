<?php

namespace App\Http\Controllers\Website;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller {
    

    public function store(Request $request) {
        
        $request->validate([
            "comment"   => "required",
            'name'      => 'required',
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:comments'],
            'website'   => 'required|url',
            // 'checkmark' => 'required|boolean',
        ]);

        $data = $request->all();
        $data['post_id'] = $request->post_id;
        $data['user_id'] = Auth::user()->id ? Auth::user()->id : NULL;
        $data['checkmark'] = ( $request->checkmark == 1 ) ? true : false;
        Comment::create( $data );
        return back()->with('message', 'Your comment has been send!!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
