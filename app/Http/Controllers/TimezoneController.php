<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Timezone;
use Illuminate\Http\Request;

class TimezoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query=Timezone::query();

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        //  if ($request->filled('status')) {
        //     $status = $request->status === 'active' ? 1 : 0;
        //     $query->where('active', $status);
        // }

         $countries=Country::all();
         $timezones = $query->orderBy('id', 'asc')->paginate(20);
          $timezonesArr=Timezone::pluck('name','id');
        //    $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];

         return view('backend.timezones.index', compact('timezones','countries','timezonesArr'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
    return view('backend.timezones.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'country_id' => 'required|exists:countries,id',
        'name' => 'required|string',
        'value' => 'required|string'
    ]);

    Timezone::create([
        'country_id' => $request->input('country_id'),
        'name' => $request->input('name'),
        'value' => $request->input('value')
    ]);

    return redirect()->route('timezones.index')->with('success', 'Timezone created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $timezone = Timezone::with('country')->find($id);
    if (!$timezone) {
        return redirect()->route('timezones.index')->with('error', 'Timezone not found.');
    }

    return view('backend.timezones.show', compact('timezone'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
