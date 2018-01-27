<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'type_id',
        'location_id',
        'starts',
        'ends',
        'location',
        'event_description',
        'event_requirements',
        'user_id',
        'num_registered',
        'num_attended',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
