@extends('layouts.customlayouts')



@section('content')

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <ol class="breadcrumb">
            <li><a href="/leaves">ลางาน/ขาดงาน</a></li>
            <li class="active">แก้ไข</li>
          </ol>
            <div class="panel-regis">
                <div class="heading">แก้ไขการขาดงาน</div>

                <div class = "panel-body">
                <form class = "" method = "GET" action = "{{route('leaves.update', $leaves->id)}}">

                  <label for="dateEnd" class="col-md-4 control-label">เขียนที่</label>
                  <div class="col-md-6">
                    <input type= "text" class = "form-control" name="writeAt" value="{{$leaves->writeAt}}"><br>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">เรื่อง</label>
                  <div class="col-md-6">
                  <div class="form-group">

                    {!! Form::select('leavetype_id', $leavestypes, $leaves->leavetype_id, ['placeholder' => 'Select ', 'class'=>'form-control']) !!}
                  </div>
                  </div>

                  <label for="dateEnd" class="col-md-4 control-label">เนื่องจาก</label>
                  <div class="col-md-6">
                  <textarea name="reason" rows="5" cols="50" class = "form-control" >{{$leaves->writeAt}}</textarea><br>
                </div>

                <label for="dateEnd" class="col-md-4 control-label">เรียน</label>
                <div class="col-md-6">
                  <input type= "text" class = "form-control" name="dear" value="{{$leaves->dear}}"><br>
                </div>

                  <label for="dateEnd" class="col-md-4 control-label">ข้าพเจ้า</label>
                  <div class="col-md-6">
                  <div class="form-group">

                    	<input class="form-control" name="name" type="text" value= "{{$leaves->accountinfo->name}}" disabled>
                    	<input class = "form-control" name="user_id" value= "{{$leaves->user_id}}" type="hidden">

                  </div>
                  </div>

                  <label for="designation" class="col-md-4 control-label">ตำแหน่งงาน</label>
                  <div class="col-md-6">
                    <div class="form-group">
                      @if($leaves->designation !== null)
                      <input class="form-control" name="ndesignation" type="text" value= "{{$leaves->designation->designationName}}" disabled>
                      <input name="designation" type="hidden" value= "{{$leaves->designation}}" >
                      @endif
                      @if($leaves->designation == null)
                      <input class="form-control" name="ndesignation" type="text" value= "" disabled>
                      <input class = "form-control" name="designation" value= "" type="hidden">
                      @endif

                    </div>
                  </div>

                  <label for="department" class="col-md-4 control-label">สังกัดแผนก</label>
                  <div class="col-md-6">
                    <div class="form-group">
                      @if($leaves->department !== null)
                      <input class="form-control" name="ndepartment" type="text" value= "{{$leaves->department->departmentName}}" disabled>
                      <input name="department" type="hidden" value= "{{$leaves->department}}" >
                      @endif
                      @if($leaves->department == null)
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
                  <input type= "date" class = "form-control" name="dateFrom"  value="{{$leaves->dateFrom}}"><br>
                </div>

                <label for="dateEnd" class="col-md-4 control-label">ถึงวันที่</label>
                <div class="col-md-6">
                  <input type= "date" class = "form-control" name="dateTo" value="{{$leaves->dateTo}}" ><br>
                </div>


                <label for="phone" class="col-md-4 control-label">โทร</label>
                <div class="col-md-6">
                  <input type= "text" class = "form-control" name="phone" value="{{$leaves->phone}}" ><br>
                </div>

                <label for="status" class="col-md-4 control-label">เช็คการอนุมัติ</label>
                <div class="col-md-6">
                  <select class="form-control" name="status_id">
                    <option value=" 1">Waiting</option>
                    <option value=" 2">Approved</option>
                    <option value=" 3">Disapproved</option>
                  </select>  <br></br>
                </div>

                <label for="action" class="col-md-4 control-label"></label>
                <div class="col-md-6">
                <button type="submit" class="btn btn-success">บันทึก</button>
                <button onclick="goBack()" class="btn btn-danger">ยกเลิก</button>
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
