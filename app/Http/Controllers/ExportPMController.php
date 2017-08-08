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
    $date = CutoffModel::find($request->cutoff_id);
    $dateS =  $date->dateStart;
    $dateE =  $date->dateEnd;

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
    Excel::create('export data', function($excel) use($export, $dateS, $dateE){
      $excel->setTitle('รายงานการเข้างานของพนักงาน');
      $excel->sheet('Sheet 1', function($sheet) use($export, $dateS, $dateE){


        // $sheet->fromArray($export);
        $sheet->fromArray($export, null, 'A1', false, false);
        $headings2 = array('ชื่อ-สกุล', 'ชั่วโมงงานทั้งหมด/ชม.', 'เข้างานสาย/ชม.', 'รวมเป็นเงิน/บาท', 'OT(งานนอกเวลา)/ชม.', 'เงินOT/บาท', 'เงินคงเหลือ/บาท');
        $headings1 = array('ประจำงวดวันที่'.'  '.$dateS.'  '.'ถึงวันที่'.'  '.$dateE);
        $sheet->prependRow(1, $headings1);
        $sheet->prependRow(2, $headings2);
        $sheet->mergeCells('A1:G1');
        $sheet->getStyle()->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
          );

      });
    })->export('xlsx');


  }
}
