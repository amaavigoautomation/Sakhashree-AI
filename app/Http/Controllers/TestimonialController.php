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
        $ratings = ['1','2','3','4','5'];

        return view('backend.testimonials.create',compact('ratings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $testimonials = Testimonial::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'rating' => $request->input('rating'),
            'active' => $request->input('active'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial saved successfully!');
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
        $ratings = ['1','2','3','4','5'];
        return view('backend.testimonials.edit', compact('testimonial','ratings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonials = Testimonial::findOrFail($id);
        $testimonials->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'rating' => $request->input('rating'),
            'active' => $request->input('active'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
