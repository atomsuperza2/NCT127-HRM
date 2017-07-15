@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Employee Designation</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('emdesignation.update', $emdesignation->id)}}">

                  <div class="form-group">

                  	<input class="form-control" name="name" type="text" value= "{{$emdesignation->accountinfo->name}}" disabled>
                  	<input class = "form-control" name="user_id" value= "{{$emdesignation->user_id}}" type="hidden">

                  </div>




                  <div class="form-group">

                    {!! Form::select('designation_id', $designation, $emdesignation->designation_id, ['placeholder' => 'Select designation', 'class'=>'form-control']) !!}
                  </div>


                  <input type= "date" class = "form-control" name="dateStart" value = "{{$emdesignation->dateStart}}" placeholder="Date Start"><br>
                  <input type= "date" class = "form-control" name="dateEnd" value = "{{$emdesignation->dateEnd}}" placeholder="Date End"><br>
                  <input type= "time" class = "form-control" name="shiftStart" value = "{{$emdesignation->shiftStart}}" placeholder="Shift Start"><br>
                  <input type= "time" class = "form-control" name="shiftEnd" value = "{{$emdesignation->shiftEnd}}" placeholder="Shift Start"><br>

                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

<!-- @section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.js" charset="utf-8"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>


<script type="text/javascript">
  		$(function () {
          $('#searchname').autocomplete({
            source : '{!!URL::route('autocomplete')!!}',
            minLength:1,

            select:function(e,ui){
              $('#user_id').val(ui.item.id);
              $('#name').val(ui.item.value);
            }
          });
  });

   </script>
@endsection -->
