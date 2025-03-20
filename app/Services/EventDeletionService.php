<?php

namespace App\Services;

use App\Models\Event;

class EventDeletionService
{
    public function delete(int $eventId)
    {
        $event = Event::find($eventId);

        if (!$event) 
        {
            throw new \Exception('Event not found');
        }

        $event->delete();
    }
}
