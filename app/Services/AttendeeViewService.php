<?php

namespace App\Services;

use App\Models\User;

class AttendeeViewService
{
    public function getAttendees()
    {
        return User::where('role', 'attendee')->get();
    }
}
