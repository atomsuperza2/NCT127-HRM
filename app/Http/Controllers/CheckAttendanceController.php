<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceModel;
use App\Http\Controllers\Api\DaterangeController;
use App\AccountInfo;
use App\CutoffModel;
use Carbon\Carbon;
use Excel;

class CheckAttendanceController extends Controller
{

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function checkAttendance(Request $request, $id)
  {

    $accounts = AccountInfo::find($id);


    $cutoff = CutoffModel::find($request->cutoffId);

    $ranges = DaterangeController::dateRange($cutoff->dateStart, $cutoff->dateEnd);

    foreach ($ranges as $date){
        $checkAttendance = AttendanceModel::firstOrcreate(
        ['user_id' => $id,
        'date' => $date,
        'timeIn' => '00:00',
        'timeOut' => '00:00']
      );

    }
    // dd($checkAttendance);
    // dd($cutoff);
    return view('checkAttendance.check', ['cutoff' => $cutoff, 'ranges' => $ranges], compact('accounts'));
  }

  public function submitAttendance(Request $request, $id){

    $account = AccountInfo::find($id);
    $accountST = $account->salary_type;
    $accountS = $account->salary;

    // dd($accountS);
    // dd($accountST);
    $TStart = Carbon::parse($account->shiftStart);
    $TEnd = Carbon::parse($account->shiftEnd);
    $defaultTime = Carbon::parse('00:00');

    // $de = $account->shiftStart;
    // $des = '10.00';
    // $hour = doubleval($de);
    // $result = $des + $hour;
    //   dd($result);

    for ($i=0; $i < count($request->date); $i++) {
      $TimeIn = Carbon::parse($request->timeIn[$i]);
      $TimeOut = Carbon::parse($request->timeOut[$i]);

      $hoursWorked = $TimeOut->diffInSeconds($TimeIn);
      $Hresult = gmdate('H:i:s', $hoursWorked);
      if($TStart<$TimeIn){
      $TimeIn2 = Carbon::parse($request->timeIn[$i]);
      $tardiness = $TimeIn2->diffInSeconds($TStart);
      $Tresult = gmdate('H:i:s', $tardiness);
      $request->tardiness = $Tresult;
    }elseif ($TStart>=$TimeIn) {
        $request->tardiness = $defaultTime;
    }
    if($TEnd<$TimeOut){
      $TimeOut2 = Carbon::parse($request->timeOut[$i]);
      $overTime = $TimeOut2->diffInSeconds($TEnd);
      $Oresult = gmdate('H:i:s', $overTime);
      $request->overtime = $Oresult;
    }elseif ($TEnd>=$TimeOut) {
      $request->overtime = $defaultTime;
    }

    if ($accountST==1) {
      $hour = doubleval($Hresult);
      $result = $hour*$accountS;
      $request->price = $result;
    }elseif (($accountST==2) && ($Hresult!=='00:00:00')) {
      $request->price = $accountS;
    }elseif (($accountST==2) && ($Hresult=='00:00:00')) {
      $request->price = '0.0';
    }



          AttendanceModel::find($request->a_id[$i])->update([
           'date'=> $request->date[$i],
           'timeIn'=> $request->timeIn[$i],
           'timeOut'=> $request->timeOut[$i],
           'hoursWorked' => $Hresult,
           'tardiness' => $request->tardiness,
           'overtime' => $request->overtime,
           'price' => $request->price,
        ]);
    }
        return redirect("/accounts/$id/profile");
      }


      public function exportExcel(Request $request, $id){
        $export = AttendanceModel::join('accountinfo', 'attendance.user_id', '=', 'accountinfo.id')
                                  ->where('attendance.user_id','=',$id)
                                  ->Where('attendance.tardiness','!=',null)
                                  ->where('attendance.overtime','!=',null)

                                  ->select('attendance.user_id','accountinfo.name','attendance.date','attendance.timeIn','attendance.timeOut','attendance.hoursWorked','attendance.tardiness','attendance.overTime','attendance.price')->get();
        //  dd($export);
        Excel::create('export data', function($excel) use($export){
          $excel->setTitle('รายงานการเข้างานของพนักงาน');
          $excel->sheet('Sheet 1', function($sheet) use($export){
            $sheet->fromArray($export);

          });
        })->export('xlsx');

      }
}
