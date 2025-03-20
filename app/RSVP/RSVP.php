<?php

namespace App\RSVP;

use App\Contracts\RSVP\RSVPInterface;
use App\Services\RSVPService;

class RSVP implements RSVPInterface
{
    protected $rsvpService;

    public function __construct(RSVPService $rsvpService)
    {
        $this->rsvpService = $rsvpService;
    }

    public function respondToEvent(int $eventId, int $userId, string $status)
    {
        // Call the service to process the RSVP
        $rsvp = $this->rsvpService->respondToEvent($eventId, $userId, $status);

        // If the RSVP couldn't be processed, return an error response
        if (!$rsvp) {
            if (!in_array($status, ['accepted', 'declined'])) {
                return response()->json(['error' => 'Invalid status'], 400);
            }

            if (!$rsvp) {
                return response()->json(['error' => 'Event or User not found'], 404);
            }
        }

        // Return success response if RSVP was processed correctly
        return response()->json(['message' => 'Response successfully saved', 'data' => $rsvp], 200);
    }
}
