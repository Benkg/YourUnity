<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityRecord extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'attendee_id',
        'group_name',
        'check_in_method',
        'check_in_time',
        'duration',
        'activity_status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
