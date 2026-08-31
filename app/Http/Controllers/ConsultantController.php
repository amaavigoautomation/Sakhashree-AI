<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;
use App\Models\ConsultationType;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationSubmitted;
use App\Mail\NewEnquiryMail;

class ConsultantController extends Controller
{

    public function index()
    {
        $consultations = Consultant::with('consultationType')->latest('id')->paginate(10);

        return view('backend.consultations.index', compact('consultations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'consultation_type_id' => 'required|exists:consultation_types,id',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'consultation_type_id' => $request->consultation_type_id,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'message' => $request->message,
            'concerns' => $request->concerns ? implode(', ', $request->concerns) : null,
        ];

        $consultation = Consultant::create($data);

        try {

            // Send email to admin
            Mail::to([
                'gopinathan@chakrayog.ca',
                'consult@gopinathan.ca'
            ])->bcc([
                'shehzad@puratech.in'
            ])->send(new NewEnquiryMail($consultation));

            // Send thank you email to customer
            if (!empty($consultation->email)) {
                Mail::to($consultation->email)->send(
                    new ConsultationSubmitted($consultation)
                );
            }

        } catch (\Exception $e) {

            return redirect()->route('thankyou')->with(
                'error',
                'Mail not sent. Error: ' . $e->getMessage()
            );
        }

        return redirect()->route('thankyou');
    }

    public function show($id)
    {
        $consultation = Consultant::findOrFail($id);

        return view('backend.consultations.show', compact('consultation'));
    }
}
