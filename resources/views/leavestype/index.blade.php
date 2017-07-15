@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Leave Type <a href="/leavestype/add" class="btn btn-primary "style="float:right;">New Leave type</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>
    <th>ID</th>
<th> Leave Type</th>

<th>Action</th>
</tr>
<div class="container">
    @foreach ($leavestype as $leavestypes)
    <tr>
      <td>{{ $leavestypes->id}}</td>
        <td>{{$leavestypes->leavestype}}</td>



        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['leavestype.destroy',$leavestypes->id]]) !!}
									<a class="btn btn-primary" href="{{ route('leavestype.edit', $leavestypes->id) }}">Edit</a>
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
