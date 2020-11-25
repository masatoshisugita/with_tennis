<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'ivent_id', 'content'];
    
    public function Ivent()
    {
      return $this->belongsTo('App\Ivent');
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
