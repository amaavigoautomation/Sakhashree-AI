<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = Enquiry::orderBy('id', 'desc')->paginate(10);

        return view('backend.enquiries.index', compact('enquiries'));
    }

    public function show($id)
    {
        $enquiry = Enquiry::findOrFail($id);

        return view('backend.enquiries.show', compact('enquiry'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'c_code' => 'required',
            'phone' => 'required',
            'country_id' => 'required',
            'description' => 'required|string',
        ]);

        Enquiry::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'country_code' => $request->country_code,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'description' => $request->description,
        ]);

        return redirect()->route('thankyou');
    }
}
