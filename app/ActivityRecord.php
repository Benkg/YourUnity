<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityRecord extends Model
{
    protected $fillable = [
        'event_id',
        'attendee_id',
        'check_in_time',
        'duration',
        'activity_status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
