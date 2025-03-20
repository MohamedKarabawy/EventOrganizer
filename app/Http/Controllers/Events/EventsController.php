<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Events\Create;
use App\Events\Delete;
use App\Events\Update;
use App\Events\View;
use App\Http\Requests\Events\CreateEventRequest;
use App\Http\Requests\Events\UpdateEventRequest;
use App\Http\Requests\Events\ViewEventRequest;

class EventsController extends Controller
{
    protected $createEventService;
    protected $deleteEventService;
    protected $updateEventService;
    protected $viewEventService;

    // Injecting the concrete service classes for Event actions
    public function __construct(
        Create $createEventService,
        Delete $deleteEventService,
        Update $updateEventService,
        View $viewEventService
    )
    {
        $this->createEventService = $createEventService;
        $this->deleteEventService = $deleteEventService;
        $this->updateEventService = $updateEventService;
        $this->viewEventService = $viewEventService;
    }

    // Create Event
    public function create(CreateEventRequest $request)
    {
        return $this->createEventService->create($request);  // Service handles response
    }

    // Delete Event by ID
    public function delete(int $eventId)
    {
        return $this->deleteEventService->delete($eventId);  // Service handles response
    }

    // Update Event by ID
    public function update(UpdateEventRequest $request, int $eventId)
    {
        return $this->updateEventService->update($request, $eventId);  // Service handles response
    }

    // View Events based on filters or show all
    public function view(ViewEventRequest $request)
    {
        return $this->viewEventService->view($request);  // Service handles response
    }
}
