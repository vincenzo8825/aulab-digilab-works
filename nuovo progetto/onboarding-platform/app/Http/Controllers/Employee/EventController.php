<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventFeedback;
use App\Models\EventMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::upcoming()->get();
        return view('employee.events.index', compact('events'));
    }

    /**
     * Display the specified event details
     */
    public function show(Event $event)
    {
        $isRegistered = Auth::user()->eventsParticipating()
            ->where('event_id', $event->id)
            ->exists();

        $hasAttended = Auth::user()->eventsAttended()
            ->where('event_id', $event->id)
            ->exists();

        $hasFeedback = EventFeedback::where('event_id', $event->id)
            ->where('user_id', Auth::id())
            ->exists();

        return view('employee.events.show', compact('event', 'isRegistered', 'hasAttended', 'hasFeedback'));
    }

    /**
     * Register current user for an event
     */
    public function register(Request $request, Event $event)
    {
        // Check if registration is still open
        if ($event->registration_deadline && now()->greaterThan($event->registration_deadline)) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'La registrazione per questo evento è chiusa.');
        }

        // Check if capacity is reached
        if ($event->capacity && $event->participants()->count() >= $event->capacity) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'Questo evento ha raggiunto la capacità massima.');
        }

        // Register
        $event->participants()->attach(Auth::id(), [
            'registered_at' => now()
        ]);

        return redirect()->route('employee.events.show', $event)
            ->with('success', 'Registrazione effettuata con successo!');
    }

    /**
     * Cancel registration for an event
     */
    public function cancel(Request $request, Event $event)
    {
        // Check if registration is still open
        if ($event->registration_deadline && now()->greaterThan($event->registration_deadline)) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'Non è più possibile annullare la registrazione per questo evento.');
        }

        // Cancel registration
        $event->participants()->detach(Auth::id());

        return redirect()->route('employee.events.show', $event)
            ->with('success', 'Registrazione annullata con successo.');
    }

    /**
     * Submit feedback for an attended event
     */
    public function submitFeedback(Request $request, Event $event)
    {
        // Verify user attended the event
        $hasAttended = Auth::user()->eventsAttended()
            ->where('event_id', $event->id)
            ->exists();

        if (!$hasAttended) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'Solo i partecipanti all\'evento possono inviare feedback.');
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:500'
        ]);

        EventFeedback::updateOrCreate(
            ['event_id' => $event->id, 'user_id' => Auth::id()],
            [
                'rating' => $validated['rating'],
                'feedback' => $validated['feedback'],
                'submitted_at' => now()
            ]
        );

        return redirect()->route('employee.events.show', $event)
            ->with('success', 'Feedback inviato con successo!');
    }

    /**
     * View calendar of events
     */
    public function calendar()
    {
        $events = Event::all();
        return view('employee.events.calendar', compact('events'));
    }

    /**
     * Download event ticket
     */
    public function downloadTicket(Event $event)
    {
        // Check if user is registered for the event
        $isRegistered = Auth::user()->eventsParticipating()
            ->where('event_id', $event->id)
            ->exists();

        if (!$isRegistered) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'Non sei registrato a questo evento.');
        }

        $data = [
            'event' => $event,
            'user' => Auth::user(),
            'qrcode' => 'EVENT-' . $event->id . '-USER-' . Auth::id()
        ];

        $pdf = PDF::loadView('employee.events.ticket', $data);
        return $pdf->download('ticket_' . $event->id . '.pdf');
    }

    /**
     * Download certificate of attendance
     */
    public function downloadCertificate(Event $event)
    {
        // Check if user attended the event
        $hasAttended = Auth::user()->eventsAttended()
            ->where('event_id', $event->id)
            ->exists();

        if (!$hasAttended) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'Non risulti tra i partecipanti di questo evento.');
        }

        // Generate certificate
        $data = [
            'event' => $event,
            'user' => Auth::user(),
            'date' => now()->format('d/m/Y')
        ];

        $pdf = PDF::loadView('employee.events.certificate', $data);
        return $pdf->download('certificato_' . $event->id . '.pdf');
    }

    /**
     * Download event material
     */
    public function downloadMaterial(Event $event, EventMaterial $material)
    {
        // Check if user is registered for the event
        $isRegistered = Auth::user()->eventsParticipating()
            ->where('event_id', $event->id)
            ->exists();

        if (!$isRegistered) {
            return redirect()->route('employee.events.show', $event)
                ->with('error', 'Non sei registrato a questo evento.');
        }

        // Check if material belongs to the event
        if ($material->event_id !== $event->id) {
            abort(404);
        }

        return Storage::disk('public')->download($material->file_path, $material->title);
    }
}
