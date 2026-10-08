<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::query();

        if ($request->filled('title')) {
            $query->where('title', $request->title);
        }

        if ($request->filled('has_video')) {
            $query->where('has_video', $request->has_video);
        }

        if ($request->filled('status')) {
            $query->where('active', $request->status);
        }

        $news = $query->orderBy('active', 'desc')->orderBy('id', 'desc')->paginate(20)->withQueryString();
        $titles = News::select('title')->whereNotNull('title')->where('title', '!=', '')->distinct()->pluck('title')->toArray();

        return view('backend.news.index', compact('news', 'titles'));
    }

    public function create()
    {
        return view('backend.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:news,title',
            ],

            'image_file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $news = News::create([
            'title'       => $request->input('title'),
            'description' => $request->input('description', ''),
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
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('news', 'title')->ignore($news->id),
            ],

            'image_file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $news->title = $request->input('title');
        $news->description = $request->input('description', '');
        $news->active = $request->input('active');
        $news->has_video = $request->input('has_video');
        $news->video_link = $request->input('video_link');

        $news->save();
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
