<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrintNewsCategory;
use App\Http\Controllers\Controller;

class PrintNewsCategoryController extends Controller
{
    public function index() {
        $print_media_categories = PrintNewsCategory::orderBy('id', 'DESC')->get();
        return view('admin.print-news-category.index')->with('print_media_categories', $print_media_categories);
    }

    public function store(Request $request) {

        $request->validate([
            'title'    => 'required',
        ]);

        $data         = $request->all();
        $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        PrintNewsCategory::create($data);
        return back()->with('message', 'Print & Media Category Inserted');
    }

    public function edit($id) {
        $category_data = PrintNewsCategory::find($id);

        return view('admin.print-news-category.edit', compact('category_data'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title'    => 'required',
        ]);
        $data     = $request->all();
        $category = PrintNewsCategory::find($id);

        $data['slug'] = Str::slug($request->title) . '-' . uniqid();
        $category->update($data);

        return redirect(route('admin.print-media-categories.index'))->with('message', 'Print & Media Category updated');
    }

    public function destroy($id) {
        $postData = PrintNewsCategory::find($id);
        if ($postData) {
            $postData->delete();
            return redirect(route('admin.categories.index'))->with('message', 'Print & Media Category Deleted');
        } else {
            return redirect(route('admin.categories.index'))->with('error', 'Data Not Found');
        }
    }
}

