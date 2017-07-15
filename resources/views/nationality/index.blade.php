@extends('layouts.customlayouts')

@section('content')

@if(session()->has('message'))
<h2 class ="alert alert-succress">{{session()->get('message')}}</h2>
@endif

<div class="container form-container">

<div class="col-md-12">
    <div class="panel-regis">
    <div class="heading">Nationality<a href="/nationality/add" class="btn btn-primary "style="float:right;">New Nationality</a></div>
    <div class="panel-body">
<table class="table table-striped">

  <tr>
    <th>ID</th>
<th> Nationality</th>

<th>Action</th>
</tr>
<div class="container">
    @foreach ($nationality as $nationalitys)
    <tr>
      <td>{{ $nationalitys->id}}</td>
        <td>{{$nationalitys->nationality_name}}</td>



        <td>
          {!! Form::open(['method'=>'DELETE', 'route'=>['nationality.destroy',$nationalitys->id]]) !!}
									<a class="btn btn-primary" href="{{ route('nationality.edit', $nationalitys->id) }}">Edit</a>
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
