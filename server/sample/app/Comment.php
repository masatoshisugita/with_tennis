<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'event_id', 'content'];

    public function Event()
    {
      return $this->belongsTo(Event::class);
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
