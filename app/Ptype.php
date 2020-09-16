<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptype extends Model
{
  protected $fillable = [
    'name',
  ];

  public function projects()
  {
    return $this->hasMany('App\Project');
  }
}
