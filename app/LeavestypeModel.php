<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavestypeModel extends Model
{
    protected $table = 'leavestype';
    protected $guarded = [ ];

    public function leaves()
    {
        return $this->hasMany('App\LeavesModel');
    }
    public function absences()
    {
        return $this->hasMany('App\AbsencesModel');
    }
}
