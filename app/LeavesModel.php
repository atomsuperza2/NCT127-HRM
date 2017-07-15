<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavesModel extends Model
{
  protected $table = 'leaves';
  protected $guarded = [ ];

  public function leavestype()
  {
      return $this->belongsTo('App\LeavestypeModel', 'leavetype_id');
  }
  public function designation()
  {
      return $this->belongsTo('App\DesignationModel', 'designation');
  }
  public function department()
  {
      return $this->belongsTo('App\DepartmentModel', 'department');
  }
  public function accountinfo()
  {
      return $this->belongsTo('App\AccountInfo', 'user_id');
  }
  public function status()
  {
    return $this->belongsTo('App\Status', 'status_id');
  }
}
