<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(20);
        return view('backend.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('backend.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'image_file'  => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:5120',
        ]);

        $image = $request->file('image_file');
        $imageName = time() . '_' . uniqid() . '.' . $image->extension();
        $image->move(public_path('images/galleries/image_file'), $imageName);

        Gallery::create([
            'image_file'  => $imageName,
            'description' => $request->description,
            'active'      => $request->input('active', 1),
        ]);

        return redirect()->route('galleries.index')->with('success', 'Gallery image uploaded successfully.');
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('backend.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'description' => 'required|string',
            'image_file'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = $request->only(['active', 'description']);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $filename = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('images/galleries/image_file'), $filename);
            $data['image_file'] = $filename;
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Gallery updated successfully.');
    }

}
