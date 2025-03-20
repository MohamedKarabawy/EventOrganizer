<?php

namespace App\Attendance;

use Illuminate\Http\Request;
use App\Services\AttendanceInviteService;
use App\Contracts\Attendance\InviteAttendanceInterface;

class Invite implements InviteAttendanceInterface
{
    protected $attendanceInviteService;

    public function __construct(AttendanceInviteService $attendanceInviteService)
    {
        $this->attendanceInviteService = $attendanceInviteService;
    }

    public function associateUsersWithEvent(Request $request, $eventId)
    {
        $validated = $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:eo_users,id',
        ]);

        $response = $this->attendanceInviteService->associateUsersWithEvent($eventId, $validated['user_ids']);

        if (isset($response['error'])) 
        {
            return response()->json($response, 400);
        }

        return response()->json($response, 200);
    }
}