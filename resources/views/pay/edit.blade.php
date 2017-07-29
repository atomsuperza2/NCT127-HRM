@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit pay for employee</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('pay.update', $pays->id)}}">

                  <div class="form-group">

                  	<input class="form-control" name="name" type="text" value= "{{$pays->accountinfo->name}}" disabled>
                  	<input class = "form-control" name="user_id" value= "{{$pays->user_id}}" type="hidden">

                  </div>
                  <div class="form-group">
                    <select class="form-control" name="cutoff_id">
                        <option value="{{$pays->cutoff_id}}"> {{$pays->cutoff->dateStart}} - {{$pays->cutoff->dateEnd}}</option>
                      @foreach ($cutoff as $cutoffs)
                        <option value="{{$cutoffs->id}}"> {{$cutoffs->dateStart}} - {{$cutoffs->dateEnd}}</option>
                      @endforeach
                    </select>
                  </div>

                  <input type= "time" class = "form-control" name="hourswork" value="{{$pays->hourswork}}" placeholder="ชั่วโมงงานทั้งหมด"><br>
                  <input type= "text" class = "form-control" name="hwpay" value="{{$pays->hwpay}}" placeholder="เงินทั้งหมด"><br>
                  <input type= "time" class = "form-control" name="latetime" value="{{$pays->latetime}}" placeholder="เข้างานสาย"><br>
                  <input type= "text" class = "form-control" name="ltpay" value="{{$pays->ltpay}}" placeholder="รวมเป็นเงิน"><br>
                  <input type= "time" class = "form-control" name="overtime" value="{{$pays->overtime}}" placeholder="OT(งานนอกเวลา)"><br>
                  <input type= "text" class = "form-control" name="otpay" value="{{$pays->otpay}}" placeholder="เงินนอกเวลา"><br>
                  <input type= "text" class = "form-control" name="totalpay" value="{{$pays->totalpay}}" placeholder="จำนวนเงินคงเหลือ"><br>


                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
