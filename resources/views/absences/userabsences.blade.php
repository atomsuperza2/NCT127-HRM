@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Absences</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{route('absences.storeabsences', $accounts->id)}}">

                  <div class="form-group">


                  	<input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                    <input name="user_id" type="hidden" value= "{{$accounts->id}}" >

                  </div>

                  <div class="form-group">

                    {!! Form::select('leavetype_id', $leavestypes, null, ['placeholder' => 'Select leave types', 'class'=>'form-control']) !!}
                  </div>


                  <input type= "date" class = "form-control" name="date" placeholder="Date"><br>

                  <input type= "text" class = "form-control" name="reason" placeholder="Reason"><br>

                <button type="submit" class="btn btn-primary">Add</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
