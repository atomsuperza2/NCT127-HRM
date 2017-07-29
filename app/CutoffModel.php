<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CutoffModel extends Model
{
    protected $table = 'cutoff';
      protected $guarded = [ ];

      public function pay()
      {
        return $this->hasMany('App\PayModel');
      }
}
