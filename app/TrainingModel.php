<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingModel extends Model
{
  protected $table = 'training';
  protected $guarded = [ ];

  public function trainingprogram(){
    return $this->belongsTo('App\TrainingprogramModel','trainingprogram_id');
  }
  public function accountinfo()
  {
      return $this->belongsTo('App\AccountInfo', 'user_id');
  }
}
