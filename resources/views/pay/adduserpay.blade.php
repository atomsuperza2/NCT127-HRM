@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Add Pay</div>

                <div class = "panel-body">
                  <form name = "content" action = "{{route('pay.storepay', $accounts->id)}}" method = "get">

                  <div class="form-group">
                  	<input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                    <input name="user_id" type="hidden" value= "{{$accounts->id}}" >
                  </div>

                  <div class="form-group">
                  <input class="form-control" name="cutoffname" type="text" value= "ตังแต่วันที่ {{$cutoff->dateStart}}  ถึง  {{$cutoff->dateEnd}} " >
                  <input class="form-control" name="cutoff_id" type="hidden" value= "{{$cutoff->id}}" >

                  </div>

                  <?php

                  $payment = $accounts->getPayment($cutoff->id);

                  ?>

                  <input type= "text" class = "form-control" name="hourswork"  value="{{$payment->hourswork}}" placeholder="ชั่วโมงงานทั้งหมด"><br>
                  <!-- <input type= "text" class = "form-control" name="hwpay" placeholder="เงินทั้งหมด"><br> -->
                  <input type= "text" class = "form-control" name="latetime" value="{{$payment->latetime}}" placeholder="เข้างานสาย"><br>
                  <input type= "text" class = "form-control" name="ltpay" value="{{$payment->ltpay}}" placeholder="ชั่วโมงที่สายรวมเป็นเงิน"><br>
                  <input type= "text" class = "form-control" name="overtime" value="{{$payment->overtime}}" placeholder="OT(งานนอกเวลา)"><br>
                  <input type= "text" class = "form-control" name="otpay" value="{{$payment->otpay}}" placeholder="ชั่วโมงOTรวมเป็นเงิน"><br>
                  <input type= "text" class = "form-control" name="totalpay" value="{{$payment->totalpay}}" placeholder="จำนวนเงินคงเหลือ"><br>

                  <input type= "hidden" class = "form-control" name="p_id" value="{{$payment->id}}"><br>


                  <?=csrf_field(); ?>
                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
