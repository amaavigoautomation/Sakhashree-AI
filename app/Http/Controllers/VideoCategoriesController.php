<?php

namespace App\Http\Controllers;

use App\Models\VideoCategory;
use App\Models\VideoTag;
use Illuminate\Http\Request;

class VideoCategoriesController extends Controller
{

    public function index()
    {
        $videocategories = VideoCategory::orderBy('order', 'asc')->Paginate(20);
        return view('backend.videocategories.index', compact('videocategories'));
    }


    public function create()
    {
        return view('backend.videocategories.create');
    }


    public function store(Request $request)
    {
        $active = $request->has('active') ? 1 : 0;

        $videocategories = VideoCategory::create([
            'order' =>  $request->input('order'),
            'name' =>  $request->input('name'),
            'category_class' =>  $request->input('category_class'),
            'page_title' =>  $request->input('page_title'),
            'page_slug' =>  $request->input('page_slug'),
            'page_url' =>  $request->input('page_url'),
            'meta_description' =>  $request->input('meta_description'),
            'active' =>  $active,
        ]);
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/videocategories/image_file/' . $videocategories->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $videocategories->image_file = $image->getClientOriginalName();
        }

        if($videocategories->save()){
            return redirect()->route('videocategories.index')->with('success', 'Video Category saved successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to save video category.');
        }

    }


    public function show($id)
    {
        $videocategories = VideoCategory::findOrFail($id);
        return view('backend.videocategories.show', compact('videocategories'));
    }


    public function edit($id)
    {
        $videocategories = VideoCategory::findOrFail($id);
        return view('backend.videocategories.edit', compact('videocategories'));
    }


    public function update(Request $request, $id)
    {
        $active = $request->has('active') ? 1 : 0;

        $videocategories = VideoCategory::findOrFail($id);
        $videocategories->update([
            'order' =>  $request->input('order'),
            'name' =>  $request->input('name'),
            'category_class' =>  $request->input('category_class'),
            'page_title' =>  $request->input('page_title'),
            'page_slug' =>  $request->input('page_slug'),
            'page_url' =>  $request->input('page_url'),
            'meta_description' =>  $request->input('meta_description'),
            'active' =>  $active,
        ]);
        // dd($request);
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/videocategories/image_file/' . $videocategories->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $videocategories->image_file = $image->getClientOriginalName();
        }
        if($videocategories->save()){
            return redirect()->route('videocategories.index')->with('success', 'video category updated successfully!');
        }else{
            return redirect()->back()->with('error', 'Failed to update video category.');
        }


    }


    public function destroy($id)
    {
        //
    }

}

