<?php

namespace App\Contracts\Events;

use App\Http\Requests\Events\ViewEventRequest;

interface ViewEventsInterface
{
    public function view(ViewEventRequest $request);
}