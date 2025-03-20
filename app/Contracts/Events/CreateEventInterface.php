<?php

namespace App\Contracts\Events;

use App\Http\Requests\Events\CreateEventRequest;

interface CreateEventInterface
{
    public function create(CreateEventRequest $request);
}