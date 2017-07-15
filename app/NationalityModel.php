<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NationalityModel extends Model
{
  protected $table = 'nationality';
  protected $guarded = [ ];

  public function accountinfo()
  {
      return $this->hasMany('App\AccountInfo');
  }
}
