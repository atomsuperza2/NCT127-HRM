<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CutoffModel;
use App\AttendanceModel;

class DaterangeController extends Controller
  {
    public function select ($id){

      $accounts = AccountInfo::find($id);
    $cutoff = CutoffModel::pluck('dateStart', 'id');

    // dd($cutoff);

    return view('accounts.selectCutoff', ['cutoff' => $cutoff], compact('accounts'));
    }

    public static function dateRange($start, $end, $step = '+1 day', $format = 'Y/m/d' )
   {

	     $dates = array();
	     $current = strtotime($start);
	     $last = strtotime($end);

	       while( $current <= $last ) {

		         $dates[] = date( $format, $current );
		         $current = strtotime( $step, $current );
	          }

            //dd($dates);
            return $dates;
	          //  return view('checkAttendance.check', ['dates' => $dates]);
           }

         }
