@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<ol class="breadcrumb">
  <li><a href="/leaves">leaves</a></li>
  <li class="active">New leave</li>
</ol>
            <div class="panel-regis">
                <div class="heading">Leave</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{route('leaves.store')}}">

                  <label for="dateEnd" class="col-md-4 control-label">เขียนที่</label>
                  <div class="col-md-6">
                    <input type= "text" class = "form-control" name="writeAt" ><br>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">เรื่อง</label>
                  <div class="col-md-6">
                  <div class="form-group">

                    {!! Form::select('leavetype_id', $leavestypes, null, ['placeholder' => 'Select ', 'class'=>'form-control']) !!}
                  </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">เนื่องจาก</label>
                  <div class="col-md-6">
                  <textarea name="reason" rows="5" cols="50" class = "form-control"></textarea><br>
                </div>

                <label for="dateEnd" class="col-md-4 control-label">เรียน</label>
                <div class="col-md-6">
                  <input type= "text" class = "form-control" name="dear" ><br>
                </div>

                  <label for="dateEnd" class="col-md-4 control-label">ข้าพเจ้า</label>
                  <div class="col-md-6">
                  <div class="form-group">

                  	<input class="form-control" id="searchname" name="searchname" type="text" >
                  	<input id="user_id" name="user_id" type="hidden">

                  </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">ตำแหน่งงาน</label>
                  <div class="col-md-6">
                    <div class="form-group">

                      {!! Form::select('designation', $designation, null, ['placeholder' => 'Select ', 'class'=>'form-control']) !!}
                    </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">สังกัดแผนก</label>
                  <div class="col-md-6">
                    <div class="form-group">
                      {!! Form::select('department', $department, null, ['placeholder' => 'Select ', 'class'=>'form-control']) !!}
                    </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">ต้องการลาภายในช่วงเวลา</label>
                  <div class="col-md-6">
                    <select class="form-control" name="time">
                      <option>เต็มวัน</option>
                      <option>ครึ่งวันเช้า</option>
                      <option>ครึ่งวันบ่าย</option>
                    </select><br>
                  </div>

                <label for="dateEnd" class="col-md-4 control-label">ตั้งแต่วันที่</label>
                <div class="col-md-6">
                  <input type= "date" class = "form-control" name="dateFrom" ><br>
                </div>

                <label for="dateEnd" class="col-md-4 control-label">ถึงวันที่</label>
                <div class="col-md-6">
                  <input type= "date" class = "form-control" name="dateTo" ><br>
                </div>

                <label for="dateEnd" class="col-md-4 control-label">Date Applied</label>
                <div class="col-md-6">
                  <input type= "date" class = "form-control" name="dateApplied" ><br>
                </div>

                <label for="dateEnd" class="col-md-4 control-label">โทร</label>
                <div class="col-md-6">
                  <input type= "text" class = "form-control" name="phone" ><br>
                </div>

                <label for="action" class="col-md-4 control-label"></label>
                <div class="col-md-6">
                <button type="submit" class="btn btn-success">Submit</button>
                <button onclick="goBack()" class="btn btn-danger">Canceled</button>
                </div>
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

  function goBack() {
    window.history.back();
}

   </script>
@endsection
