@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">New holidays</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{URL('/holidays/add')}}">

                  <input type= "text" class = "form-control" name="occasion" placeholder="Occasion"><br>
                  <input type= "date" class = "form-control" name="dateHoliday" placeholder="Date"><br>


                    <!-- <input type= "text" class = "form-control" name="UserQId" placeholder="UserQId"><br> -->
                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
