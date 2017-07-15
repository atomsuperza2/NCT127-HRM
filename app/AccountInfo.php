<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
class AccountInfo extends Model
{
  use Notifiable;
  use HasRoles;

  protected $table = 'accountinfo';

  protected $guarded = ['username', 'password'];

  public function emdesignation()
  {
      return $this->hasOne('App\EmDesignationModel');
  }

  public function designation()
  {
      return $this->belongsTo('App\DesignationModel','designation_id');
  }

  public function nationality()
  {
      return $this->belongsTo('App\NationalityModel','nationality_id');
  }

  public function department()
  {
      return $this->belongsTo('App\DepartmentModel');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }
  public function bankaccount()
  {
      return $this->hasOne('App\BankaccountModel','user_id','id');
  }

  public function awards()
  {
    return $this->hasMany('App\AwardsModel', 'user_id', 'id');
  }

  public function pay()
  {
    return $this->hasMany('App\PayModel', 'user_id', 'id');
  }

  public function training(){
    return $this->hasMany('App\TrainingModel');
  }

  public function leaves(){
    return $this->hasMany('App\LeavesModel');
  }

  public function absences(){
    return $this->hasMany('App\AbsencesModel', 'user_id', 'id');
  }

  public function attendance(){
    return $this->hasMany('App\AttendanceModel','user_id', 'id');
  }

  public function getAttendanceByDate($date) {

    $attendances = $this->attendance->where('date','=',$date)->first();
    return $attendances;
    // foreach ($attendances as $attendance) {
    //   if ( $attendance->date == $date ) {
  	// 		return $attendace;
    //   }
    //   return "Attendace not found!";
  	// }
  }

  public function scopeFilter($query, $keywords)
  {
  if ($keywords->name) {
      $query->where('name', 'LIKE', '%'.$keywords->name.'%');
    }
  // if ($keywords->lastname) {
  //     $query->where('name', 'LIKE', '%'.$keywords->lastname.'%');
  //   }

    return $query;
  }
}
