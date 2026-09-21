<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogTag;



class BlogCategoriesController extends Controller
{
    public function index()
    {
        $blogcategory = BlogCategory::orderBy('order', 'asc')->Paginate(20);
        //dd($users);die;

        return view('backend.blogcategory.index', compact('blogcategory'));
    }

    public function create()
    {
        return view('backend.blogcategory.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $blogcategory = BlogCategory::create([
            'name' => $request->input('name'),
            'order' => $request->input('order'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/blogcategories/image_file/' . $blogcategory->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $blogcategory->image_file = $image->getClientOriginalName();
        }
        $blogcategory->save();

        if ($blogcategory->save()) {
            return redirect()->route('blogcategories.index')->with('success', 'BlogCategory Added Successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to save user.');
        }
    }

    public function show($id)
    {
        $blogcategory = BlogCategory::find($id);

        if (!$blogcategory) {
            return redirect()->route('blogcategories.index')->with('error', 'blogcategory not found.');
        }

        return view('backend.blogcategory.show', compact('blogcategory'));
    }

    public function edit($id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view('backend.blogcategory.edit', compact('blogcategory'));
    }

    public function update(Request $request, $id)
    {
        $blogcategory = BlogCategory::find($id);

        if (!$blogcategory) {
            return redirect()->route('blogcategories.index')->with('error', 'blogcategories not found.');
        }

        $blogcategory->update([
            'name' => $request->input('name'),
            'order' => $request->input('order'),
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/blogcategories/image_file/' . $blogcategory->id;
            $image->move(public_path($folder), $image->getClientOriginalName());

            $blogcategory->image_file = $image->getClientOriginalName();
        }
        $blogcategory->save();

        return redirect()->route('blogcategories.index')->with('success', 'BlogCategory updated successfully!');
    }

    /* Explore Blog Categories */
    public function showCategory($page_slug)
    {
        $category = BlogCategory::where('page_slug', $page_slug)->firstOrFail();
        $blogs = $category->blogs()->where('active', true)->paginate(9);
        // dd($blogs);
        $blogcategory = BlogCategory::where('active', true)->orderBy('order', 'asc')->get();
        $blogtags = BlogTag::where('active', true)
        ->withCount(['blogs' => function ($query) {
            $query->where('active', true);
        }])
        ->orderBy('id', 'desc')
        ->get();

        // dd($category);

        $imageFile = $category->image_file;
        $id = $category->id;
        $imagePath = $imageFile ? secure_asset("public/images/blogcategories/image_file/{$id}/{$imageFile}") : secure_asset("dist/img/logo.png");

         $seoData = [
            'page_title' => $category->page_title,
            'page_url' => $category->page_url,
            'meta_keyword' => $category->meta_keyword,
            'meta_description' => $category->meta_description,
            'meta_image' => $imagePath,
        ];


        return view('frontend.blog_list', compact('category', 'blogs', 'blogcategory','blogtags','seoData'));
    }

    public function reorder(Request $request){

        // dd($request);
        $dataArr = $request->data;
        foreach ($dataArr as $item) {
            $model = $item['model'];

            $modelClass = 'App\\Models\\' . $model;

            if (class_exists($modelClass)) {
                $modelClass::where('id', $item['id'])->update(['order' => $item['order']]);
            }

            // BlogCategory::where('id', $item['id'])->update(['order' => $item['order']]);
        }

        return response()->json(['status' => 'success']);
    }

}
