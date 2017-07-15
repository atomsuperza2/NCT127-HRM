@extends('layouts.customlayouts')

@section('content')



<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Edit Department</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{ route('department.update', $department->id) }}">

                  <input type= "text" class = "form-control" name="departmentName" placeholder="Department" value="{{$department->departmentName}}"><br>

                    <!-- <input type= "text" class = "form-control" name="UserQId" placeholder="UserQId"><br> -->
                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
            </div>
        </div>
    </div>
</div>
@endsection
