@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit holidays</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('holidays.update', $holidays->id)}}">

                  <input type= "text" class = "form-control" name="occasion" value="{{$holidays->occasion}}" placeholder="event name"><br>
                  <input type= "date" class = "form-control" name="dateHoliday" value="{{$holidays->dateHoliday}}" placeholder="Description"><br>


                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
