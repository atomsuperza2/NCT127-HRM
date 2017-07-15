@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit holidays</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('cutoff.update', $cutoffs->id)}}">

                  <input type= "date" class = "form-control" name="dateStart" value="{{$cutoffs->dateStart}}" placeholder="date start"><br>
                  <input type= "date" class = "form-control" name="dateEnd" value="{{$cutoffs->dateEnd}}" placeholder="date end"><br>


                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
