@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">การเพิ่มสัญชาติ</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{URL('/nationality/add')}}">

                  <input type= "text" class = "form-control" name="nationality_name" placeholder="สัญชาติ"><br>



                    <!-- <input type= "text" class = "form-control" name="UserQId" placeholder="UserQId"><br> -->
                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
