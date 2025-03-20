<?php

namespace App\Services;


class AttendanceViewService
{
    public function getAttendanceByEventId(int $eventId)
    {
        $event = Event::find($eventId);
        
        if ($event) {
            return $event->attendance;
        }

        return collect([]);
    }
}
