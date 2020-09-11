<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
      'id', 'user_id', 'theme', 'content',
  ];

  public function setAuthorIdAttribute()
  {
    $this->author_id = Auth::id();  //вот те 2 основных метода но если ты например отношения сделаешь то будет инчае
  }

  public function user() {
    return $this->hasMany('App\User');
  }

  protected $hidden = [
      'created_at',
  ];
}
