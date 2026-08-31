<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query=Destination::query();

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

         if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('active', $status);
        }

        $countries=Country::all();
        $destinations = $query->orderBy('id', 'asc')->paginate(20);
         $destinationsArr=Destination::pluck('name','id');
        $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
        return view('backend.destinations.index', compact('destinations','countries','destinationsArr','statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::where('active', 1)->get();
        return view('backend.destinations.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $destinations = Destination::create([
            'country_id' => $request->input('country_id'),
            'order' => $request->input('order'),
            'name' => $request->input('name'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
            'display_on_homepage' => $request->input('display_on_homepage'),
            'active' => $request->input('active'),
        ]);

        // Cover Image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = 'images/destinations/cover_image/' . $destinations->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $destinations->cover_image = $image->getClientOriginalName();
        }

        // Thumbnail Image
        if ($request->hasFile('thumbnail_image')) {
            $image = $request->file('thumbnail_image');
            $folder = 'images/destinations/thumbnail_image/' . $destinations->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $destinations->thumbnail_image = $image->getClientOriginalName();
        }
        $destinations->save();

        return redirect()->route('destinations.index')->with('success', 'Destination saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destinations = Destination::findOrFail($id);
        return view('backend.destinations.show', compact('destinations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destinations = Destination::findOrFail($id);
        $countries = Country::where('active', 1)->get();
        return view('backend.destinations.edit', compact('destinations', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destinations = Destination::findOrFail($id);
        $destinations->update([
            'country_id' => $request->input('country_id'),
            'order' => $request->input('order'),
            'name' => $request->input('name'),
            'page_slug' => $request->input('page_slug'),
            'page_title' => $request->input('page_title'),
            'page_url' => $request->input('page_url'),
            'meta_description' => $request->input('meta_description'),
            'display_on_homepage' => $request->input('display_on_homepage'),
            'active' => $request->input('active'),
        ]);

        // Cover Image
        if ($request->hasFile('cover_image')) {
            $image = $request->file('cover_image');
            $folder = 'images/destinations/cover_image/' . $destinations->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $destinations->cover_image = $image->getClientOriginalName();
        }

        // Thumbnail Image
        if ($request->hasFile('thumbnail_image')) {
            $image = $request->file('thumbnail_image');
            $folder = 'images/destinations/thumbnail_image/' . $destinations->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $destinations->thumbnail_image = $image->getClientOriginalName();
        }
        $destinations->save();

        return redirect()->route('destinations.index')->with('success', 'Destination Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
