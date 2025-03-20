<?php

namespace App\Contracts\Attendance;

use Illuminate\Http\Request;

interface InviteAttendanceInterface
{
    public function associateUsersWithEvent(Request $request, $eventId);
}