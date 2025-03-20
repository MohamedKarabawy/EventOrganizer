<?php

namespace App\Events;

use App\Services\EventCreationService;
use App\Contracts\Events\CreateEventInterface;
use App\Http\Requests\Events\CreateEventRequest;

class Create implements CreateEventInterface
{
    protected $eventCreationService;

    public function __construct(EventCreationService $eventCreationService)
    {
        $this->eventCreationService = $eventCreationService;
    }

    public function create(CreateEventRequest $request)
    {
        try 
        {
            $event = $this->eventCreationService->create($request->all());

            return response()->json(['message' => 'Event Created Successfully.'], 201);
        } 
        catch (\Exception $e) 
        {
            return response()->json(['message' => 'Event cannot be created.'], 400);
        }
    }
}
