@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif


<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Attendance<a href="/attendance/add" class="btn btn-primary" style="float:right;">New Attendance</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>

<th>Employee</th>
<th>Date</th>
<th>Time In</th>
<th>Time out</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($attendances as $attendance)
    <tr>
      
        <td>{{$attendance->accountinfo->name}}</td>
        <td>{{$attendance->date}}</td>
        <td>{{$attendance->timeIn}}</td>
        <td>{{$attendance->timeOut}}</td>

        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['attendance.destroy',$attendance->id]]) !!}
									<a class="btn btn-primary" href="{{ route('attendance.edit', $attendance->id) }}">Edit</a>
									{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
									{!! Form::close() !!}

          </form>
        </td>
    @endforeach

    </tr>
</div>
</table>
</div>
</div>
</div>
</div>
@endsection
