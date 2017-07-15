<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TrainingprogramModel extends Model
{
  protected $table = 'trainingprogram';
  protected $guarded = [ ];

  public function training(){
    return $this->hasMany('App\TrainingModel');
  }
}
