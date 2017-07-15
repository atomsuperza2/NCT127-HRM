
@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Designations<a href="/designation/add" class="btn btn-primary "style="float:right;">New designation</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>
    <th>ID</th>
<th>Designation Name</th>
<th>Department</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($designations as $designation)
    <tr>
      <td>{{ $designation->id}}</td>
        <td>{{ $designation->designationName}}</td>
        <td>{{ $designation->department->departmentName}}</td>
        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['designation.destroy',$designation->id]]) !!}
									<a class="btn btn-primary" href="{{ route('designation.edit', $designation->id) }}">Edit</a>
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
