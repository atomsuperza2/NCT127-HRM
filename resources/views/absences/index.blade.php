@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif
<div class="container form-container">
<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Absences<a href="/absences/add" class="btn btn-primary "style="float:right;">New absences</a></div>
    <div class="panel-body">
<table class="table table-striped">
  <tr>
<th>Employee</th>
<th>Leave Type</th>
<th>Date</th>
<th>Reason</th>
<th>Action</th>
</tr>
<div class="container form-container">
    @foreach ($absencess as $absences)
    <tr>
        <td>{{$absences->accountinfo->name}}</td>
        <td>{{$absences->leavetype->leavestype}}</td>
        <td>{{$absences->date}}</td>
        <td>{{$absences->reason}}</td>

        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['absences.destroy',$absences->id]]) !!}
									<a class="btn btn-primary" href="{{ route('absences.edit', $absences->id) }}">Edit</a>
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
