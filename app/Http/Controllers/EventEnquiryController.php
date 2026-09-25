<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EventEnquiry;
use Illuminate\Http\Request;

class eventEnquiryController extends Controller
{
    public function index()
    {
        $eventsEnquiries = EventEnquiry::orderBy('id', 'desc')->paginate(20);
        return view('backend.events_enquiries.index', compact('eventsEnquiries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country_id' => 'required|exists:countries,id',
            'mobile' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $country = Country::find($request->country_id);

        EventEnquiry::create([
            'event_id' => $request->event_id,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'calling_code' => $country?->calling_code,
            'country_id' => $request->country_id,
            'description' => $request->description,
            'mobile' => $request->mobile,
        ]);

        return redirect()->back()->with('success', 'Enquiry submitted successfully.');
    }

    public function show(string $id)
    {
        $eventEnquiry = EventEnquiry::findOrFail($id);
        return view(
            'backend.events_enquiries.show',
            compact('eventEnquiry')
        );
    }
}
