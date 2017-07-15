<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
  protected $table = 'status';
  protected $guarded = [ ];

  public function leaves()
  {
  return  $this->hasMany('App\LeavesModel','status_id','id');
  }
}
