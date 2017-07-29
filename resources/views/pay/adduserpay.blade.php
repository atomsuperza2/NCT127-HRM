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
                <form class = "" method = "POST" action = "{{route('pay.storepay', $accounts->id)}}">

                  <div class="form-group">
                  	<input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                    <input name="user_id" type="hidden" value= "{{$accounts->id}}" >
                  </div>

                  <div class="form-group">
                    <select class="form-control" name="cutoff_id">
                      @foreach ($cutoff as $cutoffs)
                        <option value="{{$cutoffs->id}}"> {{$cutoffs->dateStart}} - {{$cutoffs->dateEnd}}</option>
                      @endforeach
                    </select>
                  </div>

                  <input type= "text" class = "form-control" name="hourswork" placeholder="ชั่วโมงงานทั้งหมด"><br>
                  <!-- <input type= "text" class = "form-control" name="hwpay" placeholder="เงินทั้งหมด"><br> -->
                  <input type= "text" class = "form-control" name="latetime" placeholder="เข้างานสาย"><br>
                  <input type= "text" class = "form-control" name="ltpay" placeholder="ชั่วโมงที่สายรวมเป็นเงิน"><br>
                  <input type= "text" class = "form-control" name="overtime" placeholder="OT(งานนอกเวลา)"><br>
                  <input type= "text" class = "form-control" name="otpay" placeholder="ชั่วโมงOTรวมเป็นเงิน"><br>
                  <input type= "text" class = "form-control" name="totalpay" placeholder="จำนวนเงินคงเหลือ"><br>




                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
