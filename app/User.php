<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company',
        'avatar',
        'FEIN',
        'num_events',
        'num_people_events',
        'verified',
        'phone_num',
        'website',
        'summary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function events() {
        return $this->hasMany(Event::class);
    }

    public function feedback() {
        return $this->hasMany(Feedback::class);
    }

    public function attachments() {
        return $this->hasMany(Attachments::class);
    }
}
