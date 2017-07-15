@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Training</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{route('training.storetraining', $accounts->id)}}">

                  <div class="form-group">


                    <input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                    <input name="user_id" type="hidden" value= "{{$accounts->id}}" >

                  </div>



                  <div class="form-group">

                    {!! Form::select('trainingprogram_id', $trainingprogram, null, ['placeholder' => 'Select training program', 'class'=>'form-control']) !!}
                  </div>


                  <input type= "date" class = "form-control" name="dateStart" placeholder="Date Start"><br>

                  <input type= "date" class = "form-control" name="dateEnd" placeholder="Date End"><br>
                  <input type= "time" class = "form-control" name="shiftStart" placeholder="Time Start"><br>
                  <input type= "time" class = "form-control" name="shiftEnd" placeholder="Time Start"><br>

                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
