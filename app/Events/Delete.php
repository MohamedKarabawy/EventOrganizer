<?php

namespace App\Events;

use App\Services\EventDeletionService;
use App\Contracts\Events\DeleteEventInterface;

class Delete implements DeleteEventInterface
{
    protected $eventDeletionService;

    public function __construct(EventDeletionService $eventDeletionService)
    {
        $this->eventDeletionService = $eventDeletionService;
    }

    public function delete(int $eventId)
    {
        try 
        {
            $this->eventDeletionService->delete($eventId);

            return response()->json(['message' => 'Event deleted successfully.'], 200);  
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Event cannot be deleted.', 'error' => $e->getMessage()], 400); 
        }
    }
}
