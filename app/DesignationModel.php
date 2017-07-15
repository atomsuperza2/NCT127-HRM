<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignationModel extends Model
{
  protected $table = 'designation';
  protected $guarded = [ ];

  public function emdesignation()
  {
      return $this->hasMany('App\EmDesignationModel');
  }

  public function accountinfo()
  {
      return $this->hasMany('App\AccountInfo');
  }
  public function leaves()
  {
      return $this->hasMany('App\LeavesModel');
  }
  public function department()
  {
      return $this->belongsTo('App\DepartmentModel');
  }

}
