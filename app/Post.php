<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = [
    'title', 'tag_id', 'content'
  ];

  public function tags()
  {
    return $this->belongsToMany('App\Tag')
                ->withTimestamps();
  }
}
