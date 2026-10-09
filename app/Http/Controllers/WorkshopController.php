<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WorkshopController extends Controller
{
    public function index(Request $request)
    {
        $WorkshopQuery = Workshop::query();

        if ($request->filled('name')) {
            $WorkshopQuery->where('name', $request->name);
        }

        if ($request->filled('city')) {
            $WorkshopQuery->where('city', $request->city);
        }

        if ($request->filled('status')) {
            $status = $request->status === 'active' ? 1 : 0;
            $WorkshopQuery->where('active', $status);
        }

        if ($request->filled('show_on_website')) {
            $WorkshopQuery->where('show_on_website', $request->show_on_website);
        }

        $workshops = $WorkshopQuery->orderBy('id', 'desc')->paginate(10);
        $name = Workshop::select('name')->distinct()->pluck('name')->toArray();
        $cities = Workshop::select('city')->whereNotNull('city')->where('city', '!=', '')->distinct()->pluck('city')->toArray();
        $statuses = [
            'active' => 'Active',
            'inactive' => 'Inactive'
        ];

        return view('backend.workshops.index', compact('workshops', 'name', 'cities', 'statuses'));
    }

    public function create()
    {
        return view('backend.workshops.create');
    }


    public function store(Request $request)
    {
        if ($request->input('show_on_website') == 1) {
            $websiteWorkshopCount = Workshop::where('show_on_website', 1)->count();

            if ($websiteWorkshopCount >= 2) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'show_on_website' => 'Maximum 2 workshops can be shown on the website.',
                    ]);
            }
        }
        $request->validate([
            'name' => [
                'required',
                'string',
                 'max:255',
                'unique:workshops,name',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count(trim($value));

                    if ($wordCount > 6) {
                        $fail('Workshop name must contain a maximum of 6 words.');
                    }
                },
            ],

            'image_file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required|string|max:255',

            'is_latest' => 'required|boolean',
            'active' => 'required|boolean',
            'show_on_website' => 'required|boolean',

            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count(strip_tags($value));

                    if ($wordCount > 15) {
                        $fail('Description must contain less than 15 words.');
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
            'show_on_website' => $request->input('show_on_website'),
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
        if ($request->input('show_on_website') == 1) {
            $websiteWorkshopCount = Workshop::where('show_on_website', 1)
                ->where('id', '!=', $workshop->id)
                ->count();

            if ($websiteWorkshopCount >= 2) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'show_on_website' => 'Maximum 2 workshops can be shown on the website.',
                    ]);
            }
        }
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('workshops', 'name')->ignore($workshop->id),
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count(trim($value));

                    if ($wordCount > 6) {
                        $fail('Workshop name must contain a maximum of 6 words.');
                    }
                },
            ],
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'city' => 'required|string|max:255',
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    $wordCount = str_word_count(strip_tags($value));

                    if ($wordCount > 15) {
                        $fail('Description must contain less than 15 words.');
                    }
                },
            ],
            'is_latest' => 'required|boolean',
            'active' => 'required|boolean',
            'show_on_website' => 'required|boolean',
            'image_file' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);
        $workshop->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'city' => $request->input('city'),
            'is_latest' => $request->input('is_latest'),
            'active' => $request->input('active'),
            'show_on_website' => $request->input('show_on_website'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $folder = 'images/workshops/image_file/' . $workshop->id;
            $image->move(public_path($folder), $image->getClientOriginalName());
            $workshop->image_file = $image->getClientOriginalName();
        }
        $workshop->save();

        return redirect()
            ->route('workshops_listing.index')
            ->with('success', 'Workshop saved successfully!');
    }
}
