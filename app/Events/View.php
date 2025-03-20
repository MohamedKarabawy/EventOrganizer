<?php

namespace App\Events;

use App\Services\EventViewService;
use App\Contracts\Events\ViewEventsInterface;
use App\Http\Requests\Events\ViewEventRequest;

class View implements ViewEventsInterface
{
    protected $eventViewService;

    public function __construct(EventViewService $eventViewService)
    {
        $this->eventViewService = $eventViewService;
    }

    public function view(ViewEventRequest $request)
    {
        try
        {
            $filters = $request->only(['title', 'description', 'location', 'date']);

            $events = $this->eventViewService->getAllEvents($filters);

            return response()->json(['events' => $events], 200);  
        }
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Events cannot be fetched.', 'error' => $e->getMessage()], 400);
        }
    }
}
