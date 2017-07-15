<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceModel;
use App\AccountInfo;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $attendances = AttendanceModel::all();
      return view('attendance.index', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('attendance.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $attendance = new AttendanceModel($request->except(['searchname']));
    
      $attendance->save();
      return redirect()->route('attendance.index')->with('alert-succress','Add new attendance success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $attendance = AttendanceModel::find($id);
      return view('attendance.edit', compact('attendance'));
    }

    public function calhoursWorked()
    {
      $attendance = new AttendanceModel;
      $timeIn =  $attendance -> timeIn;
      $timeOut = $attendance -> timeOut;
      $diff = $timeIn->diffInHours($timeOut);
      return ($attendance->hoursWorked = $diff);

    }

    // public function caltardiness()
    // {
    //
    //   $attendance = new AttendanceModel;
    //   $shiftStart =  $attendance->accountinfo-> shiftStart;
    //   $timeIn = $attendance -> timeIn;
    //   $diff = $shiftStart->diffInHours($timeIn);
    //   $attendance->tardiness = $diff;
    //   $attendance->save();
    // }
    //
    // public function calovertime($id)
    // {
    //   $user = AccountInfo::find($id);
    //   $attendance = new AttendanceModel;
    //   $shiftEnd =  $attendance->accountinfo->shiftEnd;
    //   $timeOut = $attendance -> timeOut;
    //   $diff = $shiftEnd->diffInHours($timeOut);
    //   $attendance->overtime = $diff;
    //   $attendance->save();
    // }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $attendance = AttendanceModel::find($id);
      $attendance->user_id = $request->user_id;
      $attendance->date = $request->date;
      $attendance->timeIn = $request->timeIn;
      $attendance->timeOut = $request->timeOut;
      $attendance->save();
      session()->flash('message','Updated Successfully');
      return redirect('/attendance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $attendance = AttendanceModel::find($id);
      $attendance->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/attendance');
    }
}
