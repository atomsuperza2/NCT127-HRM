@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Awards<a href="/awards/add" class="btn btn-primary "style="float:right;">New awards</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>

<th>Employee</th>
<th>Awards name</th>
<th>Gift item</th>
<th>Cash price</th>
<th>Action</th>
</tr>
<div class="container">
    @foreach ($awards as $award)
    <tr>
        
        <td>{{$award->accountinfo->name}}</td>
        <td>{{$award->awardName}}</td>
        <td>{{$award->giftItem}}</td>
        <td>{{$award->cashPrice}}</td>

        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['awards.destroy',$award->id]]) !!}
									<a class="btn btn-primary" href="{{ route('awards.edit', $award->id) }}">Edit</a>
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
