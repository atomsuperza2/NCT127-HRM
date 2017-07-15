@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Attendance</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('attendance.update', $attendance->id)}}">

                  <div class="form-group">

                  	<input class="form-control" name="name" type="text" value= "{{$attendance->accountinfo->name}}" disabled>
                  	<input class = "form-control" name="user_id" value= "{{$attendance->user_id}}" type="hidden">

                  </div>

                  <input type= "date" class = "form-control" name="date" value = "{{$attendance->date}}" placeholder="Date"><br>
                  <input type= "time" class = "form-control" name="timeIn" value = "{{$attendance->timeIn}}" placeholder="Time In"><br>
                  <input type= "time" class = "form-control" name="timeOut" value = "{{$attendance->timeOut}}" placeholder="Time Out"><br>

                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>
