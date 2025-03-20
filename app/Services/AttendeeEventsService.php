<?php

namespace App\Services;

use App\Models\User;
use App\Models\RSVP;
use App\Models\Event;

class AttendeeEventsService
{
    public function getUserEvents(int $userId, $perPage = 15)
    {
        // Fetch the user by their ID (check if exists)
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        // Get the events that the user is attending (RSVPed to) with pagination
        $events = Event::whereHas('attendance', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->with(['attendance' => function ($query) use ($userId) {
            $query->where('user_id', $userId);
        }])
        ->paginate($perPage); // This adds pagination to the query

        // Transforming the event data (we format the response)
        $events->getCollection()->transform(function ($event) use ($userId) {
            return [
                'event_id' => $event->id,
                'event_title' => $event->title,
                'event_description' => $event->description,
                'event_date' => $event->date,
                'status' => $event->attendance->firstWhere('user_id', $userId)->status,
            ];
        });

        // Return the paginated events with metadata
        return $events;
    }
}
