<?php

namespace App\Http\Controllers;

use App\Models\SpiritualTour;
use App\Support\ValidationRules;
use Illuminate\Http\Request;

class SpiritualTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SpiritualTour::query();

        if ($request->filled('title')) {
            $query->where('title', $request->title);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('status')) {
            $query->where('active', $request->status);
        }

        if ($request->filled('is_upcoming')) {
            $query->where('is_upcoming', $request->is_upcoming);
        }

        $spiritualTours = $query
            ->orderBy('active', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(20)
            ->withQueryString();

        $titles = SpiritualTour::select('title')
            ->whereNotNull('title')
            ->where('title', '!=', '')
            ->distinct()
            ->pluck('title')
            ->toArray();

        $locations = SpiritualTour::select('location')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->distinct()
            ->pluck('location')
            ->toArray();

        return view(
            'backend.spiritual_tours.index',
            compact('spiritualTours', 'titles', 'locations')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('backend.spiritual_tours.create');
    }

    /**
     * Store new spiritual tour.
     */
    public function store(Request $request)
    {
        // Remove unnecessary spaces.
        $request->merge([
            'title' => trim($request->title),
            'location' => trim($request->location),
        ]);

        $request->validate([
            'title' => ValidationRules::title('spiritual_tours'),

            'location' => [
                'required',
                'string',
                'max:255',
            ],

            'image_file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'description' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $words = preg_split(
                        '/\s+/',
                        trim(strip_tags($value)),
                        -1,
                        PREG_SPLIT_NO_EMPTY
                    );

                    if (count($words) > 70) {
                        $fail('Description must not exceed 70 words.');
                    }
                },
            ],

            'short_description' => [
                'exclude_if:is_upcoming,1',
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $words = preg_split(
                        '/\s+/',
                        trim(strip_tags($value)),
                        -1,
                        PREG_SPLIT_NO_EMPTY
                    );

                    if (count($words) > 24) {
                        $fail('Short Description must not exceed 24 words.');
                    }
                },
            ],
        ], [
            'title.required' => 'Please enter a tour title.',
            'title.string' => 'Tour title must contain valid text.',
            'title.max' => 'Tour title must not exceed 255 characters.',
            'title.regex' => 'Please enter a valid tour title.',
            'title.unique' => 'This tour title already exists.',

            'location.required' => 'Please enter a tour location.',
            'location.max' => 'Tour location must not exceed 255 characters.',

            'image_file.image' => 'Please upload a valid image.',
            'image_file.mimes' => 'Only JPG, JPEG, PNG, and WebP images are allowed.',
            'image_file.max' => 'Image size must not exceed 5 MB.',
        ]);

        $tour = SpiritualTour::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'short_description' => $request->input('is_upcoming', 0) == 0
                ? $request->input('short_description')
                : null,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'image_file' => $request->input('image_file'),
            'days' => $request->input('days'),
            'is_upcoming' => $request->input('is_upcoming', 0),
            'active' => $request->input('active', 0),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');

            $folder = 'images/spiritual_tours/image_file/' . $tour->id;

            $image->move(
                public_path($folder),
                $image->getClientOriginalName()
            );

            $tour->image_file = $image->getClientOriginalName();
        }

        $tour->save();

        return redirect()
            ->route('spiritual_tours_listing.index')
            ->with('success', 'Tour saved successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(string $id)
    {
        $tour = SpiritualTour::findOrFail($id);

        return view(
            'backend.spiritual_tours.edit',
            compact('tour')
        );
    }

    /**
     * Update spiritual tour.
     */
    public function update(Request $request, string $id)
    {
        $tour = SpiritualTour::find($id);

        if (!$tour) {
            return redirect()
                ->route('spiritual_tours_listing.index')
                ->with('error', 'Tour not found.');
        }

        // Remove unnecessary spaces.
        $request->merge([
            'title' => trim($request->title),
            'location' => trim($request->location),
        ]);

        $request->validate([
            'title' => ValidationRules::title(
                'spiritual_tours',
                $tour->id
            ),

            'image_file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'location' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $words = preg_split(
                        '/\s+/',
                        trim(strip_tags($value)),
                        -1,
                        PREG_SPLIT_NO_EMPTY
                    );

                    if (count($words) > 70) {
                        $fail('Description must not exceed 70 words.');
                    }
                },
            ],
            'short_description' => [
                'exclude_if:is_upcoming,1',
                'nullable',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $words = preg_split(
                        '/\s+/',
                        trim(strip_tags($value)),
                        -1,
                        PREG_SPLIT_NO_EMPTY
                    );

                    if (count($words) > 24) {
                        $fail('Short Description must not exceed 24 words.');
                    }
                },
            ],
        ], [
            'title.required' => 'Please enter a tour title.',
            'title.string' => 'Tour title must contain valid text.',
            'title.max' => 'Tour title must not exceed 255 characters.',
            'title.regex' => 'Please enter a valid tour title.',
            'title.unique' => 'This tour title already exists.',

            'location.required' => 'Please enter a tour location.',
            'location.max' => 'Tour location must not exceed 255 characters.',

            'image_file.image' => 'Please upload a valid image.',
            'image_file.mimes' => 'Only JPG, JPEG, PNG, and WebP images are allowed.',
            'image_file.max' => 'Image size must not exceed 5 MB.',
        ]);

        $tour->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'short_description' => $request->input('is_upcoming', 0) == 0
                ? $request->input('short_description')
                : null,
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'location' => $request->input('location'),
            'days' => $request->input('days'),
            'is_upcoming' => $request->input('is_upcoming', 0),
            'active' => $request->input('active', 0),
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');

            $folder = 'images/spiritual_tours/image_file/' . $tour->id;

            $image->move(
                public_path($folder),
                $image->getClientOriginalName()
            );

            $tour->image_file = $image->getClientOriginalName();
            $tour->save();
        }

        return redirect()
            ->route('spiritual_tours_listing.index')
            ->with('success', 'Tour updated successfully!');
    }
}
