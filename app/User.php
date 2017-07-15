<?php

namespace App;

use App\AccountInfo;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password'
    ];

    protected $guarded = ['roles', 'permissions'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 //    public function post()
 // {
 //     return $this->hasMany(Post::class, 'author_id', 'id');
 // }

 public function account_info()
 {
     return $this->hasOne('App\AccountInfo');
 }

 public function data()
 {
     return $this->hasOne('App\AccountInfo');
 }
 public function posts()
  {
      return $this->hasMany(Post::class);
  }
}
