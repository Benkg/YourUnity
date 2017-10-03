<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventAttachment extends Model
{
    protected $fillable = [
        'attachment_id',
        'event_id',
    ];
}
