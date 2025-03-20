<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RSVP extends Model
{
    // Table Name
    protected $table = 'eo_rsvp';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'event_id',
        'status'
    ];
}
