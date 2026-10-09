<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoCategory;
use App\Models\VideosVideoTag;
use App\Models\VideoTag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VideosController extends Controller
{
    public function index(Request $request)
    {

        // dd($request);
        $videoQuery = Video::where('active', true);

        if ($request->filled('title')) {
            $videoQuery->where('title', $request->title);
        }

        if ($request->filled('active')) {
            $status = $request->active === 'active' ? 1 : 0;
            $videoQuery->where('active', $status);
        }

        $videos = $videoQuery->orderBy('order', 'asc')->paginate(20);
        $titles = Video::select('title')->distinct()->get();
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
        $posts = ['1' => 'Yes', '0' => 'No'];
        $disphomepage = ['1' => 'Yes', '0' => 'No'];

        return view('backend.videos.index', compact('videos', 'statuses', 'titles', 'posts', 'disphomepage'));
    }


    public function create()
    {
        return view('backend.videos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('videos', 'title')],
            'video_link' => ['required', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);
        $active = $request->has('active') ? 1 : 0;

        $videos = Video::create([
            'order' =>  $request->input('order'),
            'title' =>  $request->input('title'),
            'profession' =>  $request->input('profession'),
            'video_link' =>  $request->input('video_link'),
            'description' =>  $request->input('description'),
            'active' =>  $active,
        ]);
        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/videos/image_file/' . $videos->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $videos->image_file = $image->getClientOriginalName();
        }
        $videos->save();

        return redirect()->route('videos.index')->with('success', 'Video  saved successfully!');
    }


    public function show($id)
    {
        $videos = Video::findOrFail($id);
        return view('backend.videos.show', compact('videos'));
    }


    public function edit($id)
    {
        $videos = Video::findOrFail($id);

        return view('backend.videos.edit', compact('videos'));
    }


    public function update(Request $request, $id)
    {
        $videos = Video::findOrFail($id);

        $request->validate([
            'title' => ['required',  'string', 'max:255', Rule::unique('videos', 'title')->ignore($videos->id),],
            'video_link' => ['required', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $videos->update([
            'order' =>  $request->input('order'),
            'title' =>  $request->input('title'),
            'profession' =>  $request->input('profession'),
            'video_link' =>  $request->input('video_link'),
            'description' =>  $request->input('description'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/videos/image_file/' . $videos->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $videos->image_file = $image->getClientOriginalName();
        }
        $videos->save();

        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }


    public function destroy($id)
    {
        //
    }
}
