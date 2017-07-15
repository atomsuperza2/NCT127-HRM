@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit Absences</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('absences.update', $absences->id)}}">

                  <div class="form-group">

                  	<input class="form-control" name="name" type="text" value= "{{$absences->accountinfo->name}}" disabled>
                  	<input class = "form-control" name="user_id" value= "{{$absences->user_id}}" type="hidden">

                  </div>




                  <div class="form-group">

                    {!! Form::select('leavetype_id', $leavestypes, $absences->leavetype_id, ['placeholder' => 'Select leave types', 'class'=>'form-control']) !!}
                  </div>


                  <input type= "date" class = "form-control" name="date" value = "{{$absences->date}}" placeholder="Date"><br>

                  <input type= "text" class = "form-control" name="reason" value = "{{$absences->reason}}" placeholder="Reason"><br>

                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
