<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceModel extends Model
{
  protected $table = 'attendance';
  protected $guarded = [];

  public function accountinfo()
  {
    return $this->belongsTo('App\AccountInfo', 'user_id');
  }

}
