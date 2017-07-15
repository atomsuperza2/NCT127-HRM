@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit leave type</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('nationality.update', $nationalitys->id)}}">

                  <input type= "text" class = "form-control" name="nationality_name" value="{{$nationalitys->nationality_name}}" placeholder="Nationality"><br>

                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
