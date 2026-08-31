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
        // dd($request->all());
        $request->validate([
            'image_file'   => 'required',
            'image_file.*' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ], [
            'image_file.*.mimes' => 'Each image must be a file of type: jpeg, png, jpg, svg, webp.',
        ]);

        if ($request->hasFile('image_file')) {
            foreach ($request->file('image_file') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $folder = 'images/galleries/image_file';
                $image->move(public_path($folder), $imageName);

                Gallery::create([
                    'image_file' => $imageName,
                    'active'     => $request->input('active', 1),
                ]);
            }

            return redirect()->route('galleries.index')
    ->with('success', 'Gallery images uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No images were uploaded.');
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
                'image_file' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            ], [
                'image_file.mimes' => 'Only JPG, PNG, and WEBP images are allowed.',
            ]);

            $data = $request->only(['active']);

            if ($request->hasFile('image_file')) {
                $image  = $request->file('image_file');
                $folder = 'images/galleries/image_file/';
                $filename = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path($folder), $filename);
                $data['image_file'] = $filename;
            }

            $gallery->update($data);

            return redirect()->route('galleries.index')
                ->with('success', 'Gallery updated successfully.');
        }

}
