@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Bank account</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('bankaccount.update', $bankaccount->id)}}">

                  <div class="form-group">

                  	<input class="form-control" name="name" type="text" value= "{{$bankaccount->accountinfo->name}}" disabled>
                  	<input class = "form-control" name="user_id" value= "{{$bankaccount->user_id}}" type="hidden">

                  </div>

                  <input type= "text" class = "form-control" name="account_name" value = "{{$bankaccount->account_name}}" placeholder="Account name"><br>
                  <input type= "text" class = "form-control" name="account_number" value = "{{$bankaccount->account_number}}" placeholder="Account number"><br>
                  <input type= "text" class = "form-control" name="bank_name" value = "{{$bankaccount->bank_name}}" placeholder="Bank name"><br>

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
