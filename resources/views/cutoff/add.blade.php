@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">เพ่ิมการจ่ายยอดใหม่</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{URL('/cutoff/add')}}">

                  <input type= "date" class = "form-control" name="dateStart" placeholder="เริ่ม"><br>
                  <input type= "date" class = "form-control" name="dateEnd" placeholder="สิ้นสุด"><br>


                    <!-- <input type= "text" class = "form-control" name="UserQId" placeholder="UserQId"><br> -->
                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
