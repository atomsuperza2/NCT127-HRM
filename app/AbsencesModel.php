<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsencesModel extends Model
{
  protected $table = 'absences';
  protected $guarded = [ ];

  public function leavetype()
  {
      return $this->belongsTo('App\LeavestypeModel', 'leavetype_id');
  }

  public function accountinfo()
  {
      return $this->belongsTo('App\AccountInfo', 'user_id');
  }
}
