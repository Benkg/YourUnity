<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
  protected $fillable = [
      'user_id',
      'location_id',
      'address',
      'city',
      'state',
      'country',
      'postal_code',
      'latitude',
      'longitude'
  ];
}
