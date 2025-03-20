<?php

namespace App\Services;

use App\Models\Event;

class EventUpdateService
{
    public function update(int $eventId, array $validatedData)
    {
        $event = Event::find($eventId);

        if (!$event) 
        {
            throw new \Exception('Event not found');
        }

        $event->update($validatedData);

        return $event;
    }
}