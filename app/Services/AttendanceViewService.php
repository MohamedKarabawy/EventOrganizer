<?php

namespace App\Services;

use App\Models\Event;

class AttendanceViewService
{
    public function getAttendanceByEventId(int $eventId, $perPage = 15)
    {
        $event = Event::find($eventId);
        
        if ($event) {
            // Paginate the attendance (RSVPs) for the event
            $attendance = $event->attendance()
                ->with(['user:id,name,phone_number'])
                ->paginate($perPage);
            
            // Map the data to include only required fields
            $attendanceData = $attendance->map(function ($rsvp) {
                return [
                    'status' => $rsvp->status,
                    'user' => [
                        'name' => $rsvp->user->name,
                        'phone_number' => $rsvp->user->phone_number,
                    ]
                ];
            });

            // Prepare the final array with pagination metadata
            return [
                'attendance' => $attendanceData,
                'pagination' => [
                    'total' => $attendance->total(),
                    'per_page' => $attendance->perPage(),
                    'current_page' => $attendance->currentPage(),
                    'last_page' => $attendance->lastPage(),
                    'from' => $attendance->firstItem(),
                    'to' => $attendance->lastItem(),
                ]
            ];
        }

        return [
            'attendance' => [],
            'pagination' => [
                'total' => 0,
                'per_page' => $perPage,
                'current_page' => 1,
                'last_page' => 1,
                'from' => 0,
                'to' => 0,
            ]
        ];
    }
}
