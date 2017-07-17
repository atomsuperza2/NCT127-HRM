<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarytypeModel extends Model
{
  protected $table = 'salary_type';
  protected $guarded = [ ];

  public function accountinfo()
  {
  return  $this->hasMany('App\AccountInfo','salary_type','id');
  }
}
