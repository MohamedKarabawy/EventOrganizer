<?php

namespace App\Http\Controllers\Attendance;


use App\Attendance\View;
use App\Attendance\Invite;
use Illuminate\Http\Request;
use App\Attendance\Attendees;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    protected $viewAttendance;
    protected $inviteAttendance;
    protected $attendees;

    public function __construct(View $viewAttendance, Invite $inviteAttendance, Attendees $attendees)
    {
        $this->viewAttendance = $viewAttendance;
        $this->inviteAttendance = $inviteAttendance;
        $this->attendees = $attendees;
    }

    public function show(int $eventId)
    {
        return $this->viewAttendance->view($eventId);
    }

    public function associateUsersWithEvent(Request $request, $eventId)
    {
        return $this->inviteAttendance->associateUsersWithEvent($request, $eventId);
    }

    public function showAttendees()
    {
        return $this->attendees->getAttendees();
    }
}
