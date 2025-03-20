<?php

namespace App\Attendance;

use App\Services\AttendanceViewService;
use App\Contracts\Attendance\ViewAttendanceInterface;

class View implements ViewAttendanceInterface
{
    protected $attendanceViewService;

    public function __construct(AttendanceViewService $attendanceViewService)
    {
        $this->attendanceViewService = $attendanceViewService;
    }

    public function view(int $eventId)
    {
        try
        {
            $attendance = $this->attendanceViewService->getAttendanceByEventId($eventId);

            return response()->json($attendance, 200);  
        }
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Attendance cannot be fetched.', 'error' => $e->getMessage()], 400);
        }
    }
}