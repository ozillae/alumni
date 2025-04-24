<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::paginate(10);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'link_online' => 'nullable|string|max:255',
            'file_event' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'created_by' => 'nullable|integer',
            'active' => 'boolean',
        ]);

        if ($request->hasFile('file_event')) {
            $validated['file_event'] = $request->file('file_event')->store('event_images', 'public');
        }

        $validated['created_by'] = Auth::id(); // Set the authenticated user as the creator
        $validated['updated_by'] = Auth::id(); // Set the authenticated user as the updater

        Event::create($validated);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'link_online' => 'nullable|string|max:255',
            'file_event' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'updated_by' => 'nullable|integer',
            'active' => 'boolean',
        ]);

        if ($request->hasFile('file_event')) {
            if ($event->file_event) {
                Storage::disk('public')->delete($event->file_event);
            }
            $validated['file_event'] = $request->file('file_event')->store('event_images', 'public');
        }

        $validated['updated_by'] = Auth::id(); // Update the updater field

        $event->update($validated);
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
