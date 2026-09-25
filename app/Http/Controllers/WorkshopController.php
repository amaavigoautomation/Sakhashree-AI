<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::orderBy('active', 'desc')->paginate(20);

        return view('backend.workshops.index', compact('workshops'));
    }

    public function create()
    {
        return view('backend.workshops.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required|string',
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count(strip_tags($value));

                    if ($wordCount > 80) {
                        $fail('Description must contain less than 80 words.');
                    }
                },
            ],
        ]);

        $workshop = Workshop::create([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'city' => $request->input('city'),
            'is_latest' => $request->input('is_latest'),
            'active' => $request->input('active'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');

            $folder = 'images/workshops/image_file/' . $workshop->id;

            $image->move(
                public_path($folder),
                $image->getClientOriginalName()
            );

            $workshop->image_file = $image->getClientOriginalName();
        }

        $workshop->save();

        return redirect()
            ->route('workshops_listing.index')
            ->with('success', 'Workshop saved successfully!');
    }



    public function edit(string $id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('backend.workshops.edit', compact('workshop'));
    }

    public function update(Request $request, string $id)
    {
        $workshop = Workshop::findOrFail($id);

        $workshop->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'city' => $request->input('city'),
            'is_latest' => $request->input('is_latest'),
            'active' => $request->input('active'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/workshops/image_file/' . $workshop->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $workshop->image_file = $image->getClientOriginalName();
        }
        $workshop->save();
    }
}
