<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
  protected $fillable = [
      'unique_name',
      'user_id',
      'name',
      'type',
      'size'
  ];

  public function user() {
      return $this->belongsTo(User::class);
  }
}
