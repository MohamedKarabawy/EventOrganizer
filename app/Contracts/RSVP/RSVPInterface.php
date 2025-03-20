<?php

namespace App\Contracts\RSVP;

interface RSVPInterface
{
    public function respondToEvent(int $eventId, int $userId, string $status);
}
