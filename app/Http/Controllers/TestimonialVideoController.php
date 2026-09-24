<?php

namespace App\Http\Controllers;

use App\Models\TestimonialVideo;
use Illuminate\Http\Request;

class TestimonialVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonialVideos = TestimonialVideo::orderBy('id', 'asc')->paginate(10);

        return view('backend.testimonials_videos.index', compact('testimonialVideos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.testimonials_videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'video_link' => 'required',
            'active' => 'required',
        ]);

        $testimonialVideo = TestimonialVideo::create([
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'image' => null,
            'video_link' => $request->input('video_link'),
            'active' => $request->input('active'),
        ]);

        // Upload image
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $folder = 'images/testimonials_video/' . $testimonialVideo->id;
            $imageName = $image->getClientOriginalName();

            $image->move(
                public_path($folder),
                $imageName
            );

            $testimonialVideo->image = $imageName;
            $testimonialVideo->save();
        }

        if ($request->hasFile('facial_image')) {

            $image = $request->file('facial_image');
            $folder = 'images/testimonials_video_faces/' . $testimonialVideo->id;
            $imageName = $image->getClientOriginalName();

            $image->move(
                public_path($folder),
                $imageName
            );

            $testimonialVideo->facial_image = $imageName;
            $testimonialVideo->save();
        }

        return redirect()
            ->route('testimonials_videos.index')
            ->with('success', 'Testimonial video created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonialVideo = TestimonialVideo::findOrFail($id);

        return view(
            'backend.testimonials_videos.edit',
            compact('testimonialVideo')
        );
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $testimonialVideo = TestimonialVideo::find($id);

        if (!$testimonialVideo) {
            return redirect()->route('testimonials_videos.index')
                ->with('error', 'Testimonial video not found.');
        }

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'video_link' => 'required',
            'active' => 'required',
        ]);

        $testimonialVideo->update([
            'name' => $request->input('name'),
            'designation' => $request->input('designation'),
            'video_link' => $request->input('video_link'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $folder = 'images/testimonials_video/' . $testimonialVideo->id;

            // Delete old image
            if (!empty($testimonialVideo->image)) {
                $oldImage = public_path(
                    $folder . '/' . $testimonialVideo->image
                );
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $imageName = $image->getClientOriginalName();
            $image->move(
                public_path($folder),
                $imageName
            );
            $testimonialVideo->image = $imageName;
        }

        if ($request->hasFile('facial_image')) {
            $image = $request->file('facial_image');
            $folder = 'images/testimonials_video_faces/' . $testimonialVideo->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $testimonialVideo->facial_image = $image->getClientOriginalName();
        }
        $testimonialVideo->save();

        return redirect()
            ->route('testimonials_videos.index')
            ->with('success', 'Testimonial video updated successfully.');
    }
}
