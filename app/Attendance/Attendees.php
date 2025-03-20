<?php

namespace App\Attendance;

use App\Services\AttendeeViewService;
use App\Contracts\Attendance\GetAttendeesInterface;

class Attendees implements GetAttendeesInterface
{
    protected $attendeeViewService;

    public function __construct(AttendeeViewService $attendeeViewService)
    {
        $this->attendeeViewService = $attendeeViewService;
    }

    public function getAttendees()
    {
        return $this->attendeeViewService->getAttendees();
    }
}
