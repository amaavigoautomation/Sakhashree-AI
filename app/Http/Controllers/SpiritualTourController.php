<?php

namespace App\Http\Controllers;

use App\Models\SpiritualTour;
use Illuminate\Http\Request;

class SpiritualTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spiritualTours = SpiritualTour::orderBy('active', 'desc')->Paginate(20);
        return view('backend.spiritual_tours.index', compact('spiritualTours'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.spiritual_tours.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $tour = SpiritualTour::create([
            'title'       => $request->input('title'),
            'description' => $request->input('description'),
            'start_date'  => $request->input('start_date'),
            'end_date'    => $request->input('end_date'),
            'location'    => $request->input('location'),
            'image_file'  => $request->input('image_file'),
            'days'        => $request->input('days'),
            'is_upcoming' => $request->input('is_upcoming', 0),
            'active'      => $request->input('active', 0),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/spiritual_tours/image_file/' . $tour->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $tour->image_file = $image->getClientOriginalName();
        }
        $tour->save();

        return redirect()->route('spiritual_tours_listing.index')->with('success', 'Tour saved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tour = SpiritualTour::findOrFail($id);
        return view('backend.spiritual_tours.edit', compact('tour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $tour = SpiritualTour::find($id);

    if (!$tour) {
        return redirect()->route('spiritual_tours_listing.index')
            ->with('error', 'Tour not found.');
    }

    $tour->update([
        'title'       => $request->input('title'),
        'description' => $request->input('description'),
        'start_date'  => $request->input('start_date'),
        'end_date'    => $request->input('end_date'),
        'location'    => $request->input('location'),
        'days'        => $request->input('days'),
        'is_upcoming' => $request->input('is_upcoming'),
        'active'      => $request->input('active'),
    ]);

    // Update image only when a new image is selected
    if ($request->hasFile('image_file')) {
        $image = $request->file('image_file');

        $folder = 'images/spiritual_tours/image_file/' . $tour->id;

        $image->move(
            public_path($folder),
            $image->getClientOriginalName()
        );

        $tour->image_file = $image->getClientOriginalName();
        $tour->save();
    }

    return redirect()->route('spiritual_tours_listing.index')
        ->with('success', 'Tour updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
