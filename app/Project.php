<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
    'title', 'photo', 'url', 'viewer', 'ptype_id',
  ];

  public function ptype()
  {
    return $this->belongsTo('App\Ptype');
  }
}
