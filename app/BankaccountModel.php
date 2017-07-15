<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankaccountModel extends Model
{
    protected $table = 'bankaccount';
    protected $guarded = [ ];

    public function accountinfo()
    {
        return $this->belongsTo('App\AccountInfo', 'user_id');
    }
}
