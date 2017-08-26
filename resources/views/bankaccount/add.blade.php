@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">บัญชีธนาคาร</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{route('bankaccount.store')}}">

                  <div class="form-group">

                  	<input class="form-control" id="searchname" name="searchname" type="text" placeholder="ลูกจ้าง">
                  	<input id="user_id" name="user_id" type="hidden">

                  </div>


                  <input type= "text" class = "form-control" name="account_name" placeholder="ชื่อบัญชี"><br>
                  <input type= "text" class = "form-control" name="account_number" placeholder="เลขบัญชี"><br>
                  <input type= "text" class = "form-control" name="bank_name" placeholder="ธนาคาร"><br>


                <button type="submit" class="btn btn-primary">เพิ่ม</button>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
              </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
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
@endsection
