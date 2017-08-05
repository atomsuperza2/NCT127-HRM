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
    $att = AttendanceModel::where('user_id', $id)->where('cutoff_id', $request->cutoff_id)->get();

    $totalLateTimePrice = PaymentToEmController::calTotalLateTimePrice($accounts->id, $accounts->salary_type, $accounts->salary, $att[0]->totalL);
    $totalOTPrice = PaymentToEmController::calTotalOTPrice($accounts->id, $accounts->salary_type, $accounts->salary, $att[0]->totalOT);
    
    $payforuser = PayModel::firstOrcreate([
      'user_id' => $id,
      'cutoff_id' => $request->cutoff_id,
      'hourswork' => $att[0]->totalH,
      'latetime' => $att[0]->totalL,
      'ltpay' => $totalLateTimePrice,
      'overtime' => $att[0]->totalOT,
      'otpay' => $totalOTPrice,
      'totalpay' => $att[0]->totalP,
    ]);

    return view('payforuser.adduserpay', ['cutoff' => $cutoff, 'att' => $att], compact('accounts'));
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

    public function calTotalLateTimePrice($id, $salary_type, $salary, $totalL){
      $result = 0;
      if ($salary_type == 1) {
        $result = $salary*$totalL;
      }elseif ($salary_type == 2) {
        $result = 0;
      }elseif ($salary_type == 3) {
        $result = 0;
      }

      return $result;
    }

    public function calTotalOTPrice($id, $salary_type, $salary, $totalOT){
      $result = 0;
      if ($salary_type == 1) {
        $result = $salary*$totalOT;
      }elseif ($salary_type == 2) {
        $result = 0;
      }elseif ($salary_type == 3) {
        $result = 0;
      }

      return $result;
    }
}
