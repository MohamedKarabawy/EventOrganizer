<?php

namespace App\Events;

use App\Services\EventUpdateService;
use App\Contracts\Events\UpdateEventInterface;
use App\Http\Requests\Events\UpdateEventRequest;

class Update implements UpdateEventInterface
{
    protected $eventUpdateService;

    public function __construct(EventUpdateService $eventUpdateService)
    {
        $this->eventUpdateService = $eventUpdateService;
    }

    public function update(UpdateEventRequest $request, int $eventId)
    {
        try 
        {
            $event = $this->eventUpdateService->update($eventId, $request->all());

            return response()->json(['message' => 'Event updated successfully.', 'event' => $event], 200);  
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Event cannot be updated.', 'error' => $e->getMessage()], 400);
        }
    }
}
