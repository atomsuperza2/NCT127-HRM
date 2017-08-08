<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PayModel;
use App\AccountInfo;
use App\CutoffModel;
use Excel;

class ExportPMController extends Controller
{
  public function selectExport()
  {
      $cutoff = CutoffModel::get();
      return view('exportPM.selectCutoff', ['cutoff' => $cutoff]);
  }

  public function exportExcel(Request $request){
    $cutoff = CutoffModel::get();

    $export = PayModel::join('accountinfo', 'pay.user_id', '=', 'accountinfo.id')
                        ->where('pay.cutoff_id', $request->cutoff_id)
                        ->select(
                                 'accountinfo.name',
                                 'pay.hourswork',
                                 'pay.latetime',
                                 'pay.ltpay',
                                 'pay.overtime',
                                 'pay.otpay',
                                 'pay.totalpay')->get();

    //  dd($export);
    Excel::create('export data', function($excel) use($export){
      $excel->setTitle('รายงานการเข้างานของพนักงาน');
      $excel->sheet('Sheet 1', function($sheet) use($export){

        // $sheet->fromArray($export);
        $sheet->fromArray($export, null, 'A1', false, false);
        $headings = array('ชื่อ-สกุล', 'ชั่วโมงงานทั้งหมด/ชม.', 'เข้างานสาย/ชม.', 'รวมเป็นเงิน/บาท', 'OT(งานนอกเวลา)/ชม.', 'เงินOT/บาท', 'เงินคงเหลือ');
        $sheet->prependRow(1, $headings);

      });
    })->export('xlsx');


  }
}
