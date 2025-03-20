<?php

namespace App\Contracts\Events;


interface DeleteEventInterface
{
    public function delete(int $eventId);
}