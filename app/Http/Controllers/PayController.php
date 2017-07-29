<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayModel;
use App\AccountInfo;
use App\CutoffModel;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pays = PayModel::get();
      return view('pay.index', ['pays' => $pays]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cutoff = CutoffModel::get();
        return view('pay.add', ['cutoff' => $cutoff]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $pays = new PayModel($request->except(['searchname']));
      $pays->save();
      return redirect()->route('pay.index')->with('alert-succress','Add new awards success.');
    }

    public function usercreatepay(Request $request, $id)
    {

      $accounts = AccountInfo::find($id);
      $cutoff = CutoffModel::find($request->cutoff_id);
      $payforuser = PayModel::firstOrcreate(
      [ 'user_id' => $id,
        'cutoff_id' => $request->cutoff_id,
      ]);

      return view('pay.adduserpay', ['cutoff' => $cutoff], compact('accounts'));
    }

    public function storepay(Request $request, $id){

      // $dStart = PayModel::join('cutoff', 'pay.cutoff_id', '=', 'cutoff.id')
      //                     ->where('cutoff.id', '=', $request->cutoff_id)
      //                     ->select('cutoff.dateStart')->get();
      //                     dd($dStart);
      // // $dEnd = PayModel::join('cutoff', 'pay.cutoff_id', '=', 'cutoff.id')
      // //                   ->where('pay.cutoff_id','=','cutoff.id')
      // //                   ->select('cutoff.dateEnd')->get();
      // $th = PayModel::join('attendance', 'pay.user_id', '=', 'attendance.user_id')
      //                 ->where('attendance.user_id', '=', $id)
      //                 ->where('attendance.date', '=', $dStart)
      //                 ->select('attendance.totalH')->get();
      // $tl = PayModel::join('attendance', 'pay.user_id', '=', 'attendance.user_id')
      //                 ->where('attendance.date', '=', $dStart)
      //                 ->where('attendance.user_id', '=',$id)
      //                 ->select('attendance.totalL')->get();
      // $tot = PayModel::join('attendance', 'pay.user_id', '=', 'attendance.user_id')
      //                 ->where('attendance.date', '=', $dStart)
      //                 ->where('attendance.user_id', '=',$id)
      //                 ->select('attendance.totalOT')->get();
      // $tp = PayModel::join('attendance', 'pay.user_id', '=', 'attendance.user_id')
      //                 ->where('attendance.date', '=', $dStart)
      //                 ->where('attendance.user_id', '=',$id)
      //                 ->select('attendance.totalP')->get();
      //
      // $request->hourswork = $th;
      // $request->latetime = $tl;
      // $request->overtime = $tot;
      // $request->totalpay = $tp;

      $accounts = AccountInfo::find($id);
      $pays = new PayModel();
      $pays->user_id = $request->user_id;
      $pays->cutoff_id = $request->cutoff_id;
      $pays->hourswork = $request->hourswork;
      $pays->hwpay = $request->hwpay;
      $pays->latetime = $request->latetime;
      $pays->ltpay = $request->ltpay;
      $pays->overtime = $request->overtime;
      $pays->otpay = $request->otpay;
      $pays->totalpay = $request->totalpay;

      $pays->save();



      return redirect("/pay/$id");

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cutoff = CutoffModel::get();
      $pays = PayModel::find($id);
      return view('pay.edit', ['cutoff' => $cutoff], compact('pays'));
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
      $pays = PayModel::find($id);
      $pays->user_id = $request->user_id;
      $pays->cutoff_id = $request->cutoff_id;
      $pays->hourswork = $request->hourswork;
      $pays->hwpay = $request->hwpay;
      $pays->latetime = $request->latetime;
      $pays->ltpay = $request->ltpay;
      $pays->overtime = $request->overtime;
      $pays->otpay = $request->otpay;
      $pays->totalpay = $request->totalpay;
      $pays->save();
      session()->flash('message','Updated Successfully');
      return redirect('/pay');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pays = PayModel::find($id);
      $pays->delete();
      session()->flash('message','Delete Successfully');
      return redirect('/pay');
    }


}
