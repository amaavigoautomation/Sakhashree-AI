<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\WorkshopEnquiry;
use Illuminate\Http\Request;

class WorkshopEnquiryController extends Controller
{
    public function index()
    {
        $workshopEnquiries = WorkshopEnquiry::with('workshop')->orderBy('id', 'desc')->paginate(20);

        return view('backend.workshops_enquiries.index', compact('workshopEnquiries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'workshop_id' => 'required|exists:workshops,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|regex:/^[0-9]{10,15}$/',
            'country_id' => 'required|exists:countries,id',
            'description' => 'nullable|string',
        ]);

        $country = Country::find($request->country_id);

        WorkshopEnquiry::create([
            'workshop_id' => $request->workshop_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'calling_code' => $country?->calling_code,
            'country_id' => $request->country_id,
            'mobile' => $request->mobile,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('thankyou')
            ->with('success', 'Enquiry submitted successfully.');
    }

    public function show(string $id)
    {
        $workshopEnquiry = WorkshopEnquiry::findOrFail($id);
        return view('backend.workshops_enquiries.show', compact('workshopEnquiry'));
    }
}
