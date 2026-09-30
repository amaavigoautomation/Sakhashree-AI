<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Rules\Recaptcha;

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
            'calling_code' => 'required',
            'phone' => ['required', 'digits_between:1,12'],
            'country_id' => 'required',
            'description' => 'required|string',
            // 'g-recaptcha-response' => ['required', new Recaptcha],
        ]);

        Enquiry::create([
            'full_name' => $request->full_name,
            'subject_id' => $request->subject_id,
            'email' => $request->email,
            'calling_code' => $request->calling_code,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'description' => $request->description,
        ]);

        return redirect()->route('thankyou');
    }
}
