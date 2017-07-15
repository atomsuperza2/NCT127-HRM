@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Events  <a href="/events/add" class="btn btn-primary "style="float:right;">New events</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>

<th>Event Name</th>
<th>Event Description</th>
<th>Event Start</th>
<th>Event End</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($events as $event)
    <tr>
  
        <td>{{ $event->event_name}}</td>
        <td>{{$event->event_description}}</td>
        <td>{{$event->eventStart}}</td>
        <td>{{$event->eventEnd}}</td>

        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['events.destroy',$event->id]]) !!}
									<a class="btn btn-primary" href="{{ route('events.edit', $event->id) }}">Edit</a>
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
