@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit holidays</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('trainingprogram.update', $trainingprogram->id)}}">

                  <input type= "text" class = "form-control" name="trainingP" value="{{$trainingprogram->trainingP}}" placeholder="training program"><br>
                  <input type= "text" class = "form-control" name="trainingdiscription" value="{{$trainingprogram->trainingdiscription}}" placeholder="training discription"><br>


                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
