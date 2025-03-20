<?php

namespace App\RSVP;

use App\Services\AttendeeEventsService;
use App\Contracts\RSVP\ViewAttendeeEventsInterface;

class View implements ViewAttendeeEventsInterface
{
    protected $attendeeEventsService, $current_user;

    public function __construct(AttendeeEventsService $attendeeEventsService)
    {
        $this->attendeeEventsService = $attendeeEventsService;

        $this->current_user = auth()->user();
    }

    public function getUserEvents()
    {
        try {
            // Fetch events for the given user
            $events = $this->attendeeEventsService->getUserEvents($this->current_user->id);

            return response()->json($events, 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Events cannot be fetched.', 'error' => $e->getMessage()], 400);
        }
    }
}
