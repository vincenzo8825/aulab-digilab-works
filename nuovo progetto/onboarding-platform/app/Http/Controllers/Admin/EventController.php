<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('start_date', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'nullable|integer|min:1',
            'is_online' => 'boolean',
            'online_link' => 'nullable|url|required_if:is_online,1',
            'registration_deadline' => 'nullable|date|before:start_date'
        ]);

        $event = Event::create($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Evento creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->load(['participants', 'attendees']);
        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'capacity' => 'nullable|integer|min:1',
            'is_online' => 'boolean',
            'online_link' => 'nullable|url|required_if:is_online,1',
            'registration_deadline' => 'nullable|date|before:start_date'
        ]);

        $event->update($validated);

        return redirect()->route('admin.events.index')
            ->with('success', 'Evento aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Evento eliminato con successo!');
    }

    /**
     * Display participants of an event.
     */
    public function participants(Event $event)
    {
        $event->load(['participants', 'attendees']);
        $availableUsers = User::whereDoesntHave('eventsParticipating', function($query) use ($event) {
            $query->where('event_id', $event->id);
        })->get();

        return view('admin.events.participants', compact('event', 'availableUsers'));
    }

    /**
     * Add participants to an event.
     */
    public function addParticipants(Request $request, Event $event)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $event->participants()->attach($request->user_ids, ['registered_by' => Auth::id()]);

        return redirect()->route('admin.events.participants', $event)
            ->with('success', 'Partecipanti aggiunti con successo!');
    }

    /**
     * Mark attendance for event participants.
     */
    public function markAttendance(Request $request, Event $event)
    {
        $validated = $request->validate([
            'attendees' => 'required|array',
            'attendees.*' => 'exists:users,id',
        ]);

        // Detach all existing attendees
        $event->attendees()->detach();

        // Attach new attendees
        if (!empty($validated['attendees'])) {
            foreach ($validated['attendees'] as $userId) {
                $event->attendees()->attach($userId, [
                    'marked_by' => Auth::id(),
                    'marked_at' => now()
                ]);
            }
        }

        return redirect()->route('admin.events.show', $event)
            ->with('success', 'Presenze registrate con successo!');
    }
}
