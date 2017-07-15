@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Cutoff<a href="/cutoff/add" class="btn btn-primary "style="float:right;">New Cutoff</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>

<th> Date Start</th>
<th>Date End</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($cutoff as $cutoffs)
    <tr>
    
        <td>{{$cutoffs->dateStart}}</td>
        <td>{{$cutoffs->dateEnd}}</td>


        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['cutoff.destroy',$cutoffs->id]]) !!}
									<a class="btn btn-primary" href="{{ route('cutoff.edit', $cutoffs->id) }}">Edit</a>
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
