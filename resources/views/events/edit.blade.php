@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit event</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('events.update', $events->id)}}">

                  <input type= "text" class = "form-control" name="event_name" value="{{$events->event_name}}" placeholder="event name"><br>
                  <input type= "text" class = "form-control" name="event_description" value="{{$events->event_description}}" placeholder="Description"><br>
                  <input type= "date" class = "form-control" name="eventStart" value="{{$events->eventStart}}" placeholder="Start"><br>
                  <input type= "date" class = "form-control" name="eventEnd" value="{{$events->eventEnd}}" placeholder="End"><br>

                    <!-- <input type= "text" class = "form-control" name="UserQId" placeholder="UserQId"><br> -->
                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
