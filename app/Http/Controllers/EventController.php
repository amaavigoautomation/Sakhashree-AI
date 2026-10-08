<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class EventController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $eventQuery = Event::query();

        if ($request->filled('title')) {
            $eventQuery->where('title', $request->title);
        }

        if ($request->filled('city_name')) {
            $eventQuery->where('city_name', $request->city_name);
        }

        if ($request->filled('status')) {
            $eventQuery->where('active', $request->status);
        }

        if ($request->filled('is_past_event')) {
            $eventQuery->where('is_past_event', $request->is_past_event);
        }

        $events = $eventQuery->orderBy('id', 'desc')->paginate(10);

        $titles = Event::select('title')->get()->pluck('title')->toArray();

        $cities = Event::select('city_name')->whereNotNull('city_name')->where('city_name', '!=', '')->distinct()->pluck('city_name')->toArray();

        $statuses = [
            'active' => 'Active',
            'inactive' => 'Inactive'
        ];

        return view('backend.events.index', compact('events', 'titles', 'cities', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                'unique:events,title',
            ],

            'date' => [
                'required',
            ],

            'start_time' => [
                'required',
            ],

            'end_time' => [
                'required',
            ],

            'day' => [
                'required',
            ],

            'time_code' => [
                'nullable',
            ],

            'description' => [
                'nullable',
            ],

            'city_name' => [
                'nullable',
            ],

            'is_past_event' => [
                'required',
                'boolean',
            ],

            'active' => [
                'required',
                'boolean',
            ],

            'video_link' => [
                $request->is_past_event == 1 ? 'required' : 'nullable',
                'url',
            ],

            'image_file' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $event = Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'day' => $request->day,
            'time_code' => $request->time_code,
            'description' => $request->description,
            'video_link' => $request->video_link,
            'city_name' => $request->city_name,
            'active' => $request->active,
            'is_past_event' => $request->is_past_event,
        ]);

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/events/' . $event->id), $imageName);

            $event->update([
                'image_file' => $imageName,
            ]);
        }

        return redirect()->route('event.index')
            ->with('success', 'Event added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrFail($id);

        return view('backend.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('events', 'title')->ignore($event->id),
            ],

            'date' => [
                'required',
            ],

            'start_time' => [
                'required',
            ],

            'end_time' => [
                'required',
            ],

            'day' => [
                'required',
            ],

            'time_code' => [
                'nullable',
            ],

            'description' => [
                'nullable',
            ],

            'city_name' => [
                'nullable',
            ],

            'is_past_event' => [
                'required',
                'boolean',
            ],

            'active' => [
                'required',
                'boolean',
            ],

            'video_link' => [
                $request->is_past_event == 1 ? 'required' : 'nullable',
                'url',
            ],

            'image_file' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        $event->title = $request->title;
        $event->city_name = $request->city_name;
        $event->date = $request->date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->day = $request->day;
        $event->time_code = $request->time_code;
        $event->description = $request->description;
        $event->video_link = $request->video_link;
        $event->active = $request->active;
        $event->is_past_event = $request->is_past_event;

        if ($request->hasFile('image_file')) {
            $image = $request->file('image_file');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $folderPath = public_path('images/events/' . $event->id);

            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            $image->move($folderPath, $imageName);

            $event->image_file = $imageName;
        }

        $event->save();

        return redirect()->route('event.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('event.index')
            ->with('success', 'Event deleted successfully.');
    }
}
