<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AwardsModel extends Model
{
  protected $table = 'awards';
  protected $guarded = [ ];

  public function accountinfo()
  {
    return $this->belongsTo('App\AccountInfo', 'user_id');
  }
}
