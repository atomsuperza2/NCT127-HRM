@extends('layouts.customlayouts')

@section('content')
<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <ol class="breadcrumb">
            <li><a href="/accounts">บัญชีผู้ใช้</a></li>
            <li class="active">เพิ่มบัญชีใหม่</li>
          </ol>
            <div class="panel-regis">
                <div class="heading">เพิ่มบัญชีใหม่</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('account.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ชื่อ</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">วันเกิด</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required autofocus>

                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                            <label for="Gender" class="col-md-4 control-label">เพศ</label>

                            <div class="col-md-6">
                              <div class="checkbox">
                                <label><input type="checkbox" name="Gender" value="male">ชาย</label>
                              </div>
                              <div class="checkbox">
                                <label><input type="checkbox" name="Gender" value="female">หญิง</label>
                              </div>

                                @if ($errors->has('Gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-4 control-label">Gender</label>

                          <div class="col-md-6">
                        	<input checked="checked" name="gender" type="radio" value="M">
                        	<label for="gender" class="margin">Male</label>
                        	<input name="gender" type="radio" value="F" id="gender">
                        	<label for="gender" class="margin">Female</label>
                        </div>
                      </div> -->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">อีเมลล์</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">โทรศัพท์</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">ที่อยู่</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nationality_id') ? ' has-error' : '' }}">
                            <label for="nationality_id" class="col-md-4 control-label">สัญชาติ</label>

                            <div class="col-md-6">
                                {!! Form::select('nationality_id', $nationality, null, ['placeholder' => 'Select nationality', 'class'=>'form-control']) !!}

                                @if ($errors->has('nationality_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nationality_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('employeeID') ? ' has-error' : '' }}">
                            <label for="employeeID" class="col-md-4 control-label">EmployeeID</label>

                            <div class="col-md-6">
                                <input id="employeeID" type="text" class="form-control" name="employeeID" value="{{ old('employeeID') }}" required>

                                @if ($errors->has('employeeID'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('employeeID') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}">
                            <label for="department_id" class="col-md-4 control-label">แผนก</label>

                            <div class="col-md-6">
                                {!! Form::select('department_id', $department, null, ['placeholder' => 'Select department', 'class'=>'form-control']) !!}

                                @if ($errors->has('department_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }}">
                            <label for="designation_id" class="col-md-4 control-label">ตำแหน่ง</label>

                            <div class="col-md-6">
                                  {!! Form::select('designation_id', $designation, null, ['placeholder' => 'Select designation', 'class'=>'form-control']) !!}

                                @if ($errors->has('designation_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('hiredDate') ? ' has-error' : '' }}">
                            <label for="hiredDate" class="col-md-4 control-label">วันเริ่มจ้าง</label>

                            <div class="col-md-6">
                                <input id="hiredDate" type="date" class="form-control" name="hiredDate" value="{{ old('hiredDate') }}" required>

                                @if ($errors->has('hiredDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hiredDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('exitDate') ? ' has-error' : '' }}">
                            <label for="exitDate" class="col-md-4 control-label">วันสิ้นสัญญาจ้าง</label>

                            <div class="col-md-6">
                                <input id="exitDate" type="date" class="form-control" name="exitDate" value="{{ old('exitDate') }}" required>

                                @if ($errors->has('exitDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('exitDate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shiftStart') ? ' has-error' : '' }}">
                            <label for="shiftStart" class="col-md-4 control-label">เวลาเริ่มงาน</label>

                            <div class="col-md-6">
                                <input id="shiftStart" type="time" class="form-control" name="shiftStart" value="{{ old('shiftStart') }}" required>

                                @if ($errors->has('shiftStart'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shiftStart') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shiftEnd') ? ' has-error' : '' }}">
                            <label for="shiftEnd" class="col-md-4 control-label">เวลาเลิกงาน</label>

                            <div class="col-md-6">
                                <input id="shiftEnd" type="time" class="form-control" name="shiftEnd" value="{{ old('shiftEnd') }}" required>

                                @if ($errors->has('shiftEnd'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shiftEnd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="col-md-4 control-label">ค่าจ้าง</label>

                            <div class="col-md-4">
                                <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required>

                                @if ($errors->has('salary'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <select class="form-control" name="salary_type" style="width:110px;">
                              <option value="null">เลือก</option>
                              <option value="1">ชั่วโมง</option>
                              <option value="2">วัน</option>
                              <option value="3">เดือน</option>
                            </select>
                        </div>


                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">เลขบัตรประชาชน</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="roles" class="col-md-4 control-label">ตำแหน่ง</label>

                        <!-- <div class="form-group{{ $errors->has('roles') ? ' has-error' : '' }}">
                            <label for="roles" class="col-md-4 control-label">Roles</label>


                            <div class="col-md-6">

                                {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control']) !!}

                                @if ($errors->has('roles'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roles') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if(isset($user))

                          @include('shared._permissions', ['closed' => 'true', 'model' => $user ])

                        @endif -->


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    บันทึก
                                </button>
                                  <button onclick="goBack()" class="btn btn-danger">ยกเลิก</button>
                            </div>
                        </div>
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
