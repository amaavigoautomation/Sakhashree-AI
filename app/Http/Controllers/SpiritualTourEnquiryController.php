<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\SpiritualTourEnquiry;
use Illuminate\Http\Request;

class SpiritualTourEnquiryController extends Controller
{
    public function index()
    {
        $spiritual_tours_enquiries = SpiritualTourEnquiry::orderBy('id', 'desc')->paginate(20);

        return view('backend.spiritual_tours_enquiries.index', compact('spiritual_tours_enquiries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'spiritual_tour_id' => 'required|exists:spiritual_tours,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_id' => 'required|exists:countries,id',
            'mobile' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $country = Country::find($request->country_id);

        SpiritualTourEnquiry::create([
            'spiritual_tour_id' => $request->spiritual_tour_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'calling_code' => $country?->calling_code,
            'country_id' => $request->country_id,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Enquiry submitted successfully.');
    }

    public function show(string $id)
    {
        $spiritual_tour_enquiry = SpiritualTourEnquiry::findOrFail($id);

        return view('backend.spiritual_tours_enquiries.show', compact('spiritual_tour_enquiry'));
    }
}
