@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Department <a href="/department/add" class="btn btn-primary "style="float:right;">New department</a></div>
    <div class="body">
<table class="table table-striped">

  <tr>
    <th>ID</th>
<th>Department Name</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($departments as $department)
    <tr>
      <td>{{ $department->id}}</td>
        <td>{{ $department->departmentName}}</td>

        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['department.destroy',$department->id]]) !!}
									<a class="btn btn-primary" href="{{ route('department.edit', $department->id) }}">Edit</a>
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
