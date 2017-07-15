@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <ol class="breadcrumb">
            <li><a href="/accounts">Accounts</a></li>
            <li><a href="/accounts/{{$accounts->id}}/profile">Accounts management</a></li>
            <li class="active">Create leave</li>
          </ol>
            <div class="panel-regis">
                <div class="heading">Leave</div>

                <div class = "panel-body">
                <form class = "" method = "POST" action = "{{route('leaves.storeleave', $accounts->id)}}">



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

                      <input class="form-control" name="name" type="text" value= "{{$accounts->name}}" disabled>
                      <input name="user_id" type="hidden" value= "{{$accounts->id}}" >

                    </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">ตำแหน่งงาน</label>
                  <div class="col-md-6">
                    <div class="form-group">
                      @if($accounts->designation_id !== null)
                      <input class="form-control" name="ndesignation" type="text" value= "{{$accounts->designation->designationName}}" disabled>
                      <input name="designation" type="hidden" value= "{{$accounts->designation_id}}" >
                      @endif
                      @if($accounts->designation_id == null)
                      <input class="form-control" name="ndesignation" type="text" value= "" disabled>
                      <input class = "form-control" name="designation" value= "" type="hidden">
                      @endif

                    </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">สังกัดแผนก</label>
                  <div class="col-md-6">
                    <div class="form-group">
                      @if($accounts->department_id !== null)
                      <input class="form-control" name="ndepartment" type="text" value= "{{$accounts->department->departmentName}}" disabled>
                      <input name="department" type="hidden" value= "{{$accounts->department_id}}" >
                      @endif
                      @if($accounts->department_id == null)
                      <input class="form-control" name="ndepartment" type="text" value= "" disabled>
                      <input class = "form-control" name="department" value= "" type="hidden">
                      @endif

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


                <label for="dateEnd" class="col-md-4 control-label">โทร</label>
                <div class="col-md-6">
                  @if($accounts->phone !== null)
                    <input class="form-control" name="nphone" type="text" value= "{{$accounts->phone}}" disabled>
                    <input name="phone" type="hidden" value= "{{$accounts->phone}}" >
                    @endif
                    @if($accounts->phone == null)
                    <input class="form-control" name="nphone" type="text" value= "" disabled>
                    <input class = "form-control" name="phone" value= "" type="hidden">
                    @endif<br>
                </div>

                <label for="action" class="col-md-4 control-label"></label>
                <div class="col-md-6">
                <button type="submit" class="btn btn-success">Save</button>
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

<script type="text/javascript">
  function goBack() {
    window.history.back();
}

   </script>
@endsection
