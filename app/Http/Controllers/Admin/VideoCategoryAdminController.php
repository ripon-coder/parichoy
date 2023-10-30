<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VideoCategory;
use App\Http\Controllers\Controller;

class VideoCategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['video_category'] = VideoCategory::orderBy('id','desc')->paginate(20);
        return view('admin.video.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('admin.video.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $VideoCategory = new VideoCategory();
       $VideoCategory->slug = Str::slug($request->title) . '-' . uniqid();
       $VideoCategory->title = $request->title;
       $VideoCategory->description = $request->description;
       $VideoCategory->status = $request->status;
       $VideoCategory->save();
       return back()->with('message', 'Video Category Added Successfully!');
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
    public function edit(VideoCategory $video_category)
    {
        return view('admin.video.category.edit',compact('video_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoCategory $video_category)
    {
        $video_category->title = $request->title;
        $video_category->description = $request->description;
        $video_category->status = $request->status;
        $video_category->save();
        return back()->with('message', 'Video Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
