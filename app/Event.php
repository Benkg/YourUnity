<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'user_id',
        'location_id',
        'type_id',
        'event_name',
        'type_id',
        'location_id',
        'starts',
        'ends',
        'time_state',
        'event_description',
        'event_requirements',
        'user_id',
        'num_registered',
        'num_attended',
        'company'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
