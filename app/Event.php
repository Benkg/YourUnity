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
        'starts',
        'ends',
        'time_state',
        'event_description',
        'num_registered',
        'num_atteneded'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
