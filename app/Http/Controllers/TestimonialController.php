<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Testimonial::query();

        // Name filter
        if ($request->filled('name')) {
            $query->where('name', $request->name);
        }

        // Country filter
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('active', $request->status);
        }

        $testimonials = $query
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        // Name dropdown values
        $names = Testimonial::select('name')
            ->whereNotNull('name')
            ->where('name', '!=', '')
            ->distinct()
            ->pluck('name')
            ->toArray();

        // Country dropdown values
        $countries = Testimonial::select('country')
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->pluck('country')
            ->toArray();

        return view(
            'backend.testimonials.index',
            compact('testimonials', 'names', 'countries')
        );
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'icon' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'active' => 'required',
            'display_on_homepage' => 'required',
            'description' => 'required|string',
        ]);

        // First create testimonial
        $testimonial = Testimonial::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'designation' => $request->input('designation'),
            'icon' => null,
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'active' => $request->input('active'),
            'display_on_homepage' => $request->input('display_on_homepage'),
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

    // from frontend
    public function submitReview(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'description' => strip_tags($request->description),
            'display_on_homepage' => 0,
            'active' => 0,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted successfully.');
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'mobile' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:255',
            'icon' => 'nullable|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'country' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'active' => 'required',
            'display_on_homepage' => 'required',
            'description' => 'required|string',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->name = $request->name;
        $testimonial->email = $request->email;
        $testimonial->mobile = $request->mobile;
        $testimonial->designation = $request->designation;
        $testimonial->country = $request->country;
        $testimonial->city = $request->city;
        $testimonial->active = $request->active;
        $testimonial->display_on_homepage = $request->display_on_homepage;
        $testimonial->description = strip_tags($request->description);

        // If a new icon is uploaded
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $folder = 'images/testimonials/' . $testimonial->id;
            $folderPath = public_path($folder);

            // Create folder if it doesn't exist
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0755, true);
            }

            // Delete old icon
            if (!empty($testimonial->icon)) {

                $oldIconPath = $folderPath . '/' . $testimonial->icon;

                if (file_exists($oldIconPath)) {
                    unlink($oldIconPath);
                }
            }

            // Generate a safe unique file name
            $iconName = time() . '_' . $icon->getClientOriginalName();

            // Move new icon
            $icon->move(
                $folderPath,
                $iconName
            );

            // Save new icon name
            $testimonial->icon = $iconName;
        }

        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }
}
