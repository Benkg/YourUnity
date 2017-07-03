<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'date',
        'time_start',
        'time_end',
        'location',
        'event_description',
        'event_requirements',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
