<?php

namespace App\Models;

use App\Models\RSVP;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Table Name
    protected $table = 'eo_events';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'location',
        'date'
    ];

    public function attendance()
    {
        return $this->hasMany(RSVP::class, 'asset_id', 'id');
    }
}
