<?php

namespace App\Services;

use App\Models\Event;

class EventCreationService
{
    public function create(array $validatedData)
    {
        return Event::create($validatedData);
    }
}