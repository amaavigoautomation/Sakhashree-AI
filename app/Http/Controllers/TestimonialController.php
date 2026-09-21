<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'asc')->paginate(10);

        return view('backend.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('backend.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'country' => 'required',
            'city' => 'required',
            'active' => 'required',
            'description' => 'required',
        ]);

        // First create testimonial
        $testimonial = Testimonial::create([
            'name' => $request->input('name'),
            'icon' => null,
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'active' => $request->input('active'),
            'description' => strip_tags($request->input('description')),
        ]);

        // Upload icon
        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $folder = 'images/testimonials/' . $testimonial->id;
            $iconName = $icon->getClientOriginalName();

            // Move image
            $icon->move(
                public_path($folder),
                $iconName
            );

            // Save image name in database
            $testimonial->icon = $iconName;
            $testimonial->save();
        }

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'country' => 'required',
            'city' => 'required',
            'active' => 'required',
            'description' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->name = $request->name;
        $testimonial->country = $request->country;
        $testimonial->city = $request->city;
        $testimonial->active = $request->active;
        $testimonial->description = strip_tags($request->description);

        // If new icon is uploaded
        if ($request->hasFile('icon')) {

            $icon = $request->file('icon');
            $folder = 'images/testimonials/' . $testimonial->id;

            // Delete old icon
            if (!empty($testimonial->icon)) {
                $oldIcon = public_path($folder . '/' . $testimonial->icon);

                if (file_exists($oldIcon)) {
                    unlink($oldIcon);
                }
            }

            // New icon name
            $iconName = $icon->getClientOriginalName();

            // Move new icon
            $icon->move(
                public_path($folder),
                $iconName
            );

            // Save new icon name
            $testimonial->icon = $iconName;
        }

        $testimonial->save();

        return redirect()
            ->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }
     
}
