@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">New event</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{URL('/events/add')}}">

                  <input type= "text" class = "form-control" name="event_name" placeholder="event name"><br>
                  <input type= "text" class = "form-control" name="event_description" placeholder="Description"><br>
                  <input type= "date" class = "form-control" name="eventStart" placeholder="Start"><br>
                  <input type= "date" class = "form-control" name="eventEnd" placeholder="End"><br>

                    <!-- <input type= "text" class = "form-control" name="UserQId" placeholder="UserQId"><br> -->
                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
