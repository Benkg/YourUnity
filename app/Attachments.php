<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
  protected $fillable = [
      'file_name',
      'size',
      'type',
      'user_id'
  ];

  public function user() {
      return $this->belongsTo(User::class);
  }
}
