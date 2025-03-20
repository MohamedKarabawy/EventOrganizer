<?php

namespace App\Models;

use App\Models\User;
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
        'user_id',
        'event_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
