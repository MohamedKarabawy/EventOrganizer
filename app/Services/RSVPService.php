<?php

namespace App\Services;

use App\Models\RSVP as RSVPModel;
use App\Models\Event;
use App\Models\User;

class RSVPService
{
    public function respondToEvent(int $eventId, int $userId, string $status)
    {
        // Validate status (either accepted or declined)
        if (!in_array($status, ['accepted', 'declined'])) {
            return null;
        }

        // Ensure that the event exists
        $event = Event::find($eventId);

        if (!$event) {
            return null;
        }

        // Ensure that the user exists
        $user = User::find($userId);

        if (!$user) {
            return null;
        }

        // Check if the user is already attending this event
        $rsvp = RSVPModel::updateOrCreate(
            ['event_id' => $eventId, 'user_id' => $userId],
            ['status' => $status]
        );

        // Return the RSVP record
        return $rsvp;
    }
}