<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayModel extends Model
{
  protected $table = 'pay';
  protected $guarded = [ ];

  public function accountinfo()
  {
    return $this->belongsTo('App\AccountInfo', 'user_id');
  }

  public function cutoff()
  {
    return $this->belongsTo('App\CutoffModel', 'cutoff_id');
  }
}
