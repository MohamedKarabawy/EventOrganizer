<?php

namespace App\Contracts\Events;

use App\Http\Requests\Events\UpdateEventRequest;

interface UpdateEventInterface
{
    public function update(UpdateEventRequest $request, int $eventId);
}