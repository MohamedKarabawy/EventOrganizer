<?php

namespace App\Services;

use App\Models\Event;

class EventViewService
{
    public function getAllEvents($filters = [], $perPage = 10)
    {
        $query = Event::query();

        $query->when(!empty($filters['title']), function($q) use ($filters) {
            return $q->where('title', 'like', '%' . $filters['title'] . '%');
        });

        $query->when(!empty($filters['description']), function($q) use ($filters) {
            return $q->where('description', 'like', '%' . $filters['description'] . '%');
        });

        $query->when(!empty($filters['location']), function($q) use ($filters) {
            return $q->where('location', 'like', '%' . $filters['location'] . '%');
        });

        $query->when(!empty($filters['date']), function($q) use ($filters) {
            return $q->whereDate('date', '=', $filters['date']);
        });

        return $query->paginate($perPage);
    }
}
