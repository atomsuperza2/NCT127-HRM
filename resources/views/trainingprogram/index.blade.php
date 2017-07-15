@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Training Program<a href="/trainingprogram/add" class="btn btn-primary "style="float:right;">New trainingprogram</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>
    <th>ID</th>
<th> Training Program</th>
<th>Training Discription</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($trainingprogram as $trainingprograms)
    <tr>
      <td>{{ $trainingprograms->id}}</td>
        <td>{{$trainingprograms->trainingP}}</td>
        <td>{{$trainingprograms->trainingdiscription}}</td>


        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['trainingprogram.destroy',$trainingprograms->id]]) !!}
									<a class="btn btn-primary" href="{{ route('trainingprogram.edit', $trainingprograms->id) }}">Edit</a>
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
