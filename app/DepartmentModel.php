<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    protected $table = 'department';
    protected $guarded = [ ];

    public function designation()
    {
        return $this->hasMany('App\DesignationModel');
    }
    public function accountinfo()
    {
        return $this->hasMany('App\AccountInfo');
    }
    public function leaves()
    {
        return $this->hasMany('App\LeavesModel');
    }

}
