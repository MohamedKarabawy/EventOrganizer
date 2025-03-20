<?php

namespace App\Http\Controllers\RSVP;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RSVP\RSVP as RSVPClass;
use App\RSVP\View;

class RSVPController extends Controller
{
    protected $viewAttendeeEvents;
    protected $rsvp;

    public function __construct(View $viewAttendeeEvents, RSVPClass $rsvp)
    {
        $this->viewAttendeeEvents = $viewAttendeeEvents;
        $this->rsvp = $rsvp;
    }

    // Existing method to get user events
    public function getUserEvents()
    {
        return $this->viewAttendeeEvents->getUserEvents();
    }

    //Handle RSVP (accept/decline) for an event
    public function respondToEvent(Request $request, $eventId)
    {
        // Get the user from auth
        $userId = auth()->user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            'status' => 'required|in:accepted,declined', // Only accept accepted or declined
        ]);

        // Call the RSVP class to process the RSVP response
        return $this->rsvp->respondToEvent($eventId, $userId, $validated['status']);
    }
}
