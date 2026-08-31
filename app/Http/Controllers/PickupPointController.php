<?php

namespace App\Http\Controllers;

use App\Models\PickupPoint;
use Illuminate\Http\Request;

class PickupPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $query = PickupPoint::query();

         if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

         if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('active', $status);
        }

         $pickuppointsArr = PickupPoint::pluck('name','id');
        $pickuppoints = $query->orderBy('id', 'asc')->paginate(20);
         $statuses = ['active' => 'Active', 'inactive' => 'Inactive'];
        return view('backend.pickuppoints.index', compact('pickuppoints', 'pickuppointsArr', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pickuppoints.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $pickuppoints = PickupPoint::create([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('pickuppoints.index')->with('success', 'PickupPoint saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pickuppoint = PickupPoint::findOrFail($id);
        return view('backend.pickuppoints.show', compact('pickuppoint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $pickuppoint = PickupPoint::findOrFail($id);
        return view('backend.pickuppoints.edit', compact('pickuppoint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $pickuppoint = PickupPoint::findOrFail($id);
        $pickuppoint->update([
            'name' => $request->input('name'),
            'active' => $request->input('active'),
        ]);

        return redirect()->route('pickuppoints.index')->with('success', 'PickupPoint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
