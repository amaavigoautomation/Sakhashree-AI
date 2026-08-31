<?php

namespace App\Http\Controllers;

use App\Models\VideoTag;
use Illuminate\Http\Request;

class VideoTagController extends Controller
{

    public function index()
    {
        $videotags = VideoTag::orderBy('active', 'desc')->Paginate(20);
        return view('backend.videotags.index', compact('videotags'));
    }


    public function create()
    {
        return view('backend.videotags.create');
    }


    public function store(Request $request)
    {
        $videotags = VideoTag::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
        ]);

        return redirect()->route('videotag.index')->with('success', 'VideoTag saved successfully!');
    }


    public function show($id)
    {
        $videotags = VideoTag::findOrFail($id);
        return view('backend.videotags.show', compact('videotags'));
    }


    public function edit($id)
    {
        $videotags = VideoTag::findOrFail($id);
        return view('backend.videotags.edit', compact('videotags'));
    }


    public function update(Request $request, $id)
    {
        $videotags = VideoTag::findOrFail($id);
        $videotags->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
        ]);

        return redirect()->route('videotag.index')->with('success', 'VideoTag updated successfully!');
    }


    public function destroy($id)
    {
        //
    }

}
