<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayModel;
use App\AccountInfo;
use App\CutoffModel;
use App\AttendanceModel;

class PaymentToEmController extends Controller
{
  public function usercreatepay(Request $request, $id)
  {

    $accounts = AccountInfo::find($id);
    $cutoff = CutoffModel::find($request->cutoff_id);
    $att = AttendanceModel::where('user_id', $id)->select('totalOT');
    dd($att);
    $payforuser = PayModel::firstOrcreate([
      'user_id' => $id,
      'cutoff_id' => $request->cutoff_id,
    ]);

    return view('payforuser.adduserpay', ['cutoff' => $cutoff], compact('accounts'));
  }

  public function userstorepay(Request $request, $id){

    $accounts = AccountInfo::find($id);


    PayModel::find($request->p_id)->update([
       'hourswork'=> $request->hourswork,
       'hwpay' => $request->hwpay,
       'latetime' => $request->latetime,
       'ltpay' => $request->ltpay,
       'overtime' => $request->overtime,
       'otpay' => $request->otpay,
       'totalpay' => $request->totalpay,
    ]);

    return redirect("/accounts/$id/profile");
    }
}
