<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller {
    public function index() {
        $posts = Post::orderBy('id', 'DESC')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        $postCategory = Category::get();
        return view('admin.posts.create')->with('post_category', $postCategory);
    }

    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|boolean|',
            "image"       => "mimes:jpeg,jpg,png,gif|max:2048|required",
        ]);

        $requestData = $request->all();
        $contents     = $request->description;
        $dom         = new \DomDocument();
        // $dom->loadHtml($contents, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $dom->loadHtml(mb_convert_encoding($contents, 'HTML-ENTITIES', 'UTF-8'));


        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data              = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData          = base64_decode($data);
            $image_name        = time() . $item . '.png';
            $destination       = "upload/post-image/" . $image_name;
            $fullDestination   = asset('/upload/post-image') . '/' . $image_name;
            file_put_contents($destination, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $fullDestination);
        }

        $content = $dom->saveHTML();

        if ($posts = $request->file('image')) {
            $file_ext        = $posts->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/post-image";
            $destinationfull = "upload/post-image/" . $imagename;
            $posts->move($destination, $imagename);
            $requestData['image'] = $destinationfull;
        }

        $requestData['slug']        = Str::slug($request->title) . '-' . uniqid();
        $requestData['description'] = $content;

        $post = Post::create($requestData);
        $post->categories()->sync($request->category_id);

        return back()->with('message', 'Post Inserted');
    }

    public function edit($id) {
        $post_data    = Post::where('id', $id)->first();
        $categoryData = Category::orderBy('id', 'DESC')->get();
        return view('admin.posts.edit', compact('post_data', 'categoryData'));

    }

    public function update(Request $request, $id) {
        $request->validate([
            'category_id' => 'required',
            'title'       => 'required',
            'description' => 'required',
            'status'      => 'required|boolean',
            "image"       => "mimes:jpeg,jpg,png,gif|max:2048",
        ]);

        $requestData = $request->all();
        $postID      = Post::find($id);

        $requestData = $request->all();
        $contents     = $request->description;

        $dom = new \DomDocument();
        
        // $dom->loadHtml($contents, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $dom->loadHtml(mb_convert_encoding($contents, 'HTML-ENTITIES', 'UTF-8'));
        
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            if (strpos($data, 'data:image') !== false){
                
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $imgeData          = base64_decode($data);
                $image_name        = time() . $item . '.png';
                $destination       = "upload/post-image/" . $image_name;
                $fullDestination   = asset('/upload/post-image') . '/' . $image_name;
                file_put_contents($destination, $imgeData);

                $image->removeAttribute('src');
                $image->setAttribute('src', $fullDestination);
            }else{

            }
        }

        $content = $dom->saveHTML();
        // print_r($content);
        // die;


        if ($posts = $request->file('image')) {
            if (File::exists($postID->image)) {
                File::delete($postID->image);
            }
            $file_ext        = $posts->getClientOriginalExtension();
            $imagename       = mt_rand(111, 999999) . "." . $file_ext;
            $destination     = "upload/post-image";
            $destinationfull = "upload/post-image/" . $imagename;
            $posts->move($destination, $imagename);
            $requestData['image'] = $destinationfull;
        }
        $requestData['description']   = $content;
        $requestData['slug']          = Str::slug($request->title) . '-' . uniqid();
        $requestData['headline_post'] = $request->headline_post ? 1 : 0;

        $postID->update($requestData);
        $postID->categories()->sync($request->category_id);

        return redirect(route('admin.post.all'))->with('message', 'Post Inserted');
    }

    public function DeleteEditorExistingImage(Request $request) {
        if($request->ajax()){
            $file_name = str_replace(url('/').'/', '', $request->get('src')); 
            if (File::exists($file_name)) {
                File::delete($file_name);
            }
        }
    }

    public function destroy($id) {
        $postID = Post::find($id);
        if ($postID) {
            if (File::exists($postID->image)) {
                File::delete($postID->image);
            }
        }
        $postID->delete();
        return back()->with('message', 'Post Deleted');

    }
}
