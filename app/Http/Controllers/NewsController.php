<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('active', 'desc')->Paginate(20);
        return view('backend.news.index', compact('news'));
    }

    public function create()
    {
        return view('backend.news.create');
    }

    public function store(Request $request)
    {
        $news = News::create([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'active'      => $request->input('active'),
            'has_video'   => $request->input('has_video'),
            'video_link'  => $request->input('video_link'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/news/image_file/' . $news->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $news->image_file = $image->getClientOriginalName();
        }
        $news->save();

        return redirect()->route('news_listing.index')->with('success', 'News saved successfully!');
    }

    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('backend.news.edit', compact('news'));
    }

    public function update(Request $request, string $id)
    {
        $news = News::findOrFail($id);
        $news->update([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'active'      => $request->input('active'),
            'has_video'   => $request->input('has_video'),
            'video_link'  => $request->input('video_link'),
        ]);

        // Update image only when a new image is selected
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/news/image_file/' . $news->id;
            $image->move(
                public_path($folder),
                $image->getClientOriginalName()
            );
            $news->image_file = $image->getClientOriginalName();
            $news->save();
        }

        return redirect()->route('news_listing.index')->with('success', 'News updated successfully!');
    }
}
