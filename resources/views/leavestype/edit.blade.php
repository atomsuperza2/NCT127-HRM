@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">แก้ไขชนิดการลา</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('leavestype.update', $leavestypes->id)}}">

                  <input type= "text" class = "form-control" name="leavestype" value="{{$leavestypes->leavestype}}" placeholder="leave type"><br>

                <button type="submit" class="btn btn-primary">แก้ไข</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
