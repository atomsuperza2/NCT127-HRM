
@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">
  <a href="/emdesignation/add" class="btn btn-primary "style="float:right;">New employee designation</a>
<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Employee Designations</div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>

<th>Employee</th>
<th>Designation</th>
<th>Date Start</th>
<th>Date End</th>
<th>Shift Start</th>
<th>Shift End</th>
<th>Action</th>
</tr>
<div class="container">
  @foreach ($emdesignations as $emdesignation)
    <tr>
      
        <td> {{ $emdesignation->accountinfo->name}}</td>
        <td>{{ $emdesignation->designation->designationName}}</td>
        <td>{{ $emdesignation->dateStart}}</td>
        <td>{{ $emdesignation->dateEnd}}</td>
        <td>{{ $emdesignation->shiftStart}}</td>
        <td>{{ $emdesignation->shiftEnd}}</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['emdesignation.destroy',$emdesignation->id]]) !!}
									<a class="btn btn-primary" href="{{ route('emdesignation.edit', $emdesignation->id) }}">Edit</a>
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
