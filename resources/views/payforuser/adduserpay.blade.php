@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <ol class="breadcrumb">
            <li><a href="/accounts">Accounts</a></li>
            <li><a href="/accounts/{{$accounts->id}}/profile">Accounts management</a></li>
            <li class="active">Payment</li>
          </ol>
            <div class="panel-regis">
                <div class="heading">สรุปยอดชำระเงินพนักงาน</div>

                <div class = "panel-body">
                  <form name = "content" action = "{{route('payforuser.userstorepay', $accounts->id)}}" method = "get">

                  <div class="form-group">
                    <label for="cutoffname">ชื่อพนักงาน</label>
                  	<input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                    <input name="user_id" type="hidden" value= "{{$accounts->id}}" >
                  </div>

                  <div class="form-group">
                  <label for="cutoffname">สรุปรายการจ่ายประจำงวดวันที่</label>
                  <input class="form-control" name="cutoffname" type="text" value= "ตังแต่วันที่ {{$cutoff->dateStart}}  ถึง  {{$cutoff->dateEnd}} " >
                  <input class="form-control" name="cutoff_id" type="hidden" value= "{{$cutoff->id}}" >

                  </div>

                  <?php

                  $payment = $accounts->getPayment($cutoff->id);

                  ?>

                  <label for="hourswork">ชั่วโมงที่ทำงานทั้งหมด||ชั่วโมง</label>
                  <input type= "text" class = "form-control" name="hourswork"  value="{{$payment->hourswork}}" placeholder="ชั่วโมงงานทั้งหมด"><br>
                  <!-- <input type= "text" class = "form-control" name="hwpay" placeholder="เงินทั้งหมด"><br> -->
                  <label for="latetime">เข้างานสาย||ชั่วโมง</label>
                  <input type= "text" class = "form-control" name="latetime" value="{{$payment->latetime}}" placeholder="เข้างานสาย"><br>
                  <label for="ltpay">ชั่วโมงที่สายรวมเป็นเงิน||บาท</label>
                  <input type= "text" class = "form-control" name="ltpay" value="{{$payment->ltpay}}" placeholder="ชั่วโมงที่สายรวมเป็นเงิน"><br>
                  <label for="overtime">OT(งานนอกเวลา)||ชั่วโมง</label>
                  <input type= "text" class = "form-control" name="overtime" value="{{$payment->overtime}}" placeholder="OT(งานนอกเวลา)"><br>
                  <label for="otpay">ชั่วโมงOTรวมเป็นเงิน||บาท</label>
                  <input type= "text" class = "form-control" name="otpay" value="{{$payment->otpay}}" placeholder="ชั่วโมงOTรวมเป็นเงิน"><br>
                  <label for="totalpay">จำนวนเงินคงเหลือทั้งหมด||บาท</label>
                  <input type= "text" class = "form-control" name="totalpay" value="{{$payment->totalpay}}" placeholder="จำนวนเงินคงเหลือ"><br>

                  <input type= "hidden" class = "form-control" name="p_id" value="{{$payment->id}}"><br>


                  <?=csrf_field(); ?>
                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                        <button onclick="goBack()" class="btn btn-success">Nothing change</button>
                        <button type="submit" class="btn btn-warning">Save change</button>
                      </div>
                  </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('script')



<script type="text/javascript">

  function goBack() {
    window.history.back();
}

   </script>
@endsection
