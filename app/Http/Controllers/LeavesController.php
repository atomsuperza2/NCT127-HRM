<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeavesModel;
use App\LeavestypeModel;
use App\AccountInfo;
use App\DepartmentModel;
use App\DesignationModel;
use PDF;
use Carbon\Carbon;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $leave = LeavesModel::get();
      return view('leaves.index', ['leave' => $leave]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $leavestypes = LeavestypeModel::pluck('leavestype','id');
      $designation = DesignationModel::pluck('designationName','id');
      $department = DepartmentModel::pluck('departmentName','id');
      return view('leaves.add', ['leavestypes' => $leavestypes, 'designation' => $designation, 'department' => $department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $leaves = new LeavesModel($request->except(['searchname']));
      $leaves->save();
      return redirect()->route('leaves.index')->with('alert-succress','Add new leave success.');
    }

    public function userleave($id)
    {
      $leavestypes = LeavestypeModel::pluck('leavestype','id');
      $accounts = AccountInfo::find($id);
      return view('leaves.userleave', ['leavestypes' => $leavestypes], compact('accounts'));
    }

    public function storeleave(Request $request, $id)
    {
      $accounts = AccountInfo::find($id);
      // $absences = AbsencesModel::create(['user_id' => $accounts->id, 'leavetype_id' => $request -> leavetype_id,
      //                                             'reason' => $request -> reason, 'date' => $request -> date]);
      $leaves = new LeavesModel();
      $leaves->user_id = $request->user_id;
      $leaves->leavetype_id = $request->leavetype_id;
      $leaves->department = $request->department;
      $leaves->designation = $request->designation;
      $leaves->time = $request->time;
      $leaves->writeAt = $request->writeAt;
      $leaves->dear = $request->dear;
      $leaves->phone = $request->phone;
      $leaves->dateFrom = $request->dateFrom;
      $leaves->dateTo = $request->dateTo;
      $leaves->dateApplied = $request->dateApplied;
      $leaves->reason = $request->reason;
      $leaves->save();


      return redirect("/accounts/$id/profile");

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leaves = LeavesModel::find($id);
        // $pdf = PDF::loadView('leaves.show', ['leaves'=>$leaves]);
        return view('leaves.show', compact('leaves'));
        // return $pdf->download('doc.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $leavestypes = LeavestypeModel::pluck('leavestype','id');
      $designation = DesignationModel::pluck('designationName','id');
      $department = DepartmentModel::pluck('departmentName','id');
      $leaves = LeavesModel::find($id);
      return view('leaves.edit', ['leavestypes' => $leavestypes,'designation' => $designation, 'department' => $department] ,compact('leaves'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $dateA = Carbon::today();
        $leaves = LeavesModel::find($id);
        $leaves->user_id = $request->user_id;
        $leaves->leavetype_id = $request->leavetype_id;
        $leaves->department = $request->department;
        $leaves->designation = $request->designation;
        $leaves->time = $request->time;
        $leaves->writeAt = $request->writeAt;
        $leaves->dear = $request->dear;
        $leaves->phone = $request->phone;
        $leaves->dateFrom = $request->dateFrom;
        $leaves->dateTo = $request->dateTo;
        // $leaves->dateApplied = $dateA;
        $leaves->reason = $request->reason;
        $leaves->status_id = $request->status_id;
        $leaves->save();
        session()->flash('message','Updated Successfully');
        return redirect('/leaves');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $leaves = LeavesModel::find($id);
      $leaves->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/leaves');
    }
}
