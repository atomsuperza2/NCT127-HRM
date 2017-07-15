@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit pay for employee</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('pay.update', $pays->id)}}">

                  <div class="form-group">

                  	<input class="form-control" name="name" type="text" value= "{{$pays->accountinfo->name}}" disabled>
                  	<input class = "form-control" name="user_id" value= "{{$pays->user_id}}" type="hidden">

                  </div>

                    <input type= "text" class = "form-control" name="title" value="{{$pays->title}}" placeholder="Titile"><br>
                    <input type= "text" class = "form-control" name="amount" value="{{$pays->amount}}" placeholder="Amount"><br>

                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
