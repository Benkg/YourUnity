<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'date',
        'time_start',
        'duration',
        'location',
        'event_description',
        'recurring',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
