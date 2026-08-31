<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogTag;



class BlogTagsController extends Controller
{
    public function index()
    {
        $blogtags = BlogTag::orderBy('active', 'desc')->Paginate(20);
        return view('backend.blogtags.index', compact('blogtags'));
    }

    public function create()
    {
        return view('backend.blogtags.create');
    }

    public function store(Request $request)
    {
        $blogtags = BlogTag::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
        ]);

        return redirect()->route('blogtags.index')->with('success', 'BlogTags saved successfully!');
    }

    public function show($id)
    {
        $blogtag = BlogTag::findOrFail($id);
        return view('backend.blogtags.show', compact('blogtag'));
    }

    public function edit($id)
    {
        $blogtag = BlogTag::findOrFail($id);
        return view('backend.blogtags.edit', compact('blogtag'));
    }

    public function update(Request $request, $id)
    {
        $blogtag = BlogTag::findOrFail($id);
        $blogtag->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
        ]);

        return redirect()->route('blogtags.index')->with('success', 'BlogTags updated successfully!');
    }

}
