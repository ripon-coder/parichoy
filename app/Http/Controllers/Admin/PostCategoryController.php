<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller {
    public function index() {
        $post_category = Category::orderBy('id', 'DESC')->get();
        return view('admin.post-category.index')->with('post_category', $post_category);
    }

    public function store(Request $request) {

        $request->validate([
            'position' => isset($request->position) ? 'numeric' : '',
            'title'    => 'required',
        ]);

        $category_Priority = Category::where(['position' => $request->position])->count();
        if($category_Priority > 0){
            return back()->with('error','Category Priority already exists set another priority!!');
        }

        $data         = $request->all();
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        Category::create($data);
        return back()->with('message', 'Category Inserted');
    }

    public function edit($id) {
        $category_data = Category::find($id);
        $post_category = Category::where('parent_category_id', 0)->with('subCategories')->orderBy('id', 'DESC')->get();

        return view('admin.post-category.edit', compact('category_data', 'post_category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'position' => isset($request->position) ? 'numeric' : '',
            'title'    => 'required',
        ]);
        $data     = $request->all();
        $category = Category::find($id);

        $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        $category->update($data);

        return redirect(route('admin.categories.index'))->with('message', 'Category updated');
    }

    public function destroy($id) {
        $postData = Category::find($id);
        if ($postData) {
            $postData->delete();
            return redirect(route('admin.categories.index'))->with('message', 'Category Deleted');
        } else {
            return redirect(route('admin.categories.index'))->with('error', 'Data Not Found');
        }
    }
}
