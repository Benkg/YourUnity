<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = [
        'firedb_id',
        'avatar',
        'email',
        'name_first',
        'name_last',
        'gender',
        'birth_year',
        'birth_month',
        'birth_day',
        'phone_num'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
