@extends('layouts.customlayouts')
@include('accounts.selectCutoff')
@include('accounts.selectCutoffForpay')
@section('content')

  <div class="row">
  <div class="col-md-12 ">
  <div class="form-group">
    <ol class="breadcrumb">
      <li><a href="/accounts">บัญชี</a></li>
      <li class="active">บัญชีผู้ใช้</li>
    </ol>
        <div class="panel-regis">
            <div class="heading">ข้อมูล</div>
            <div class="panel-body">

              <div class="col-md-4">
                  <img src="/uploads/avatars/{{$accounts->avatar}}" style="width:150px; height:150px; float:center; border-radius:50%;">
                  <br><br>
                  <label for="name">ลูกจ้าง :</label>
                  <label for="name">{{$accounts->name}}</label><br>
                  <label for="id">ID :</label>
                  <label for="id">{{$accounts->id}}</label>
              </div>
              <div class="col-md-8">
                <div class="btn-group" role="group" aria-label="...">
                <a class="btn btn-primary" href="{{ route('accounts.edit', $accounts->id) }}">แก้ไขข้อมูล</a>
                <a class="btn btn-primary" id="selectCutoff">การเข้างาน</a>
                <a class="btn btn-primary" href="{{route('absences.usercreateabsences', $accounts->id) }}">การขาดงาน</a>
                <a class="btn btn-primary" href="{{ route('leaves.userleave', $accounts->id)}}">การลางาน</a>
                <a class="btn btn-primary" id="select">จ่าย</a>

                <a class="btn btn-primary" href="{{ route('bankaccount.edit', $accounts->id) }}">บัญชีธนาคาร</a>


              </div>
              <hr />

              <div class="row">
                <div class=" col-md-4">
                  <form enctype="multipart/form-data" action="{{ route('accounts.update_avatar', $accounts->id) }} " method="POST">
                    <label>แก้ไขรูปภาพ</label>

                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                    <br />
                    <input type="submit" class="btn btn-sm btn-primary">


                  </form>
                </div>
                <div class=" col-md-4" >
                  <div class="panel panel-default">
                    <h1><center>//</center></h1>
                  </div>
                </div>
                <div class=" col-md-4">
                  <div class="panel panel-default">
                    <h1><center>//</center></h1>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

<div class="container form-container">
    <div class="row">
        <div class="col-md-4">

            <div class="panel-profile">
                <div class="heading">ข้อมูลส่วนตัว</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('accounts.show', $accounts->id) }}">

                        {{ csrf_field() }}

                            <label for="birthday" class="col-md-4 control-label" >วันเกิด :</label>
                            <label for="birthday" class="col-md-8 control-label" align="left">{{$accounts->birthday}}</label>

                            <label for="Gender" class="col-md-4 control-label">เพศ :</label>
                            <label for="Gender" class="col-md-8 control-label">{{$accounts->Gender}}</label>

                            @if ($accounts->nationality_id == null)
                            <label for="Nationality" class="col-md-4 control-label">สัญชาติ :</label>
                            <label for="Nationality" class="col-md-8 control-label"> a/n </label>
                            @endif
                            @if ($accounts->nationality_id != null)
                            <label for="Nationality" class="col-md-4 control-label">สัญชาติ :</label>
                            <label for="Nationality" class="col-md-8 control-label">{{$accounts->nationality->nationality_name}}</label>
                            @endif

                            <label for="email" class="col-md-4 control-label">อีเมลล์ :</label>
                            <label for="email" class="col-md-8 control-label">{{$accounts->email}}</label>
                            @if ($accounts->phone == null)
                            <label for="phone" class="col-md-4 control-label">โทรศัพท์ :</label>
                            <label for="phone" class="col-md-8 control-label"> a/n </label>
                            @endif
                            @if ($accounts->phone != null)
                            <label for="phone" class="col-md-4 control-label">โทรศัพท์ :</label>
                            <label for="phone" class="col-md-8 control-label">{{$accounts->phone}}</label>
                            @endif
                            @if ($accounts->address == null)
                            <label for="address" class="col-md-4 control-label">ที่อยู่ :</label>
                            <label for="address" class="col-md-8 control-label"> a/n </label>
                            @endif
                            @if ($accounts->address != null)
                            <label for="address" class="col-md-4 control-label">ที่อยู่ :</label>
                            <label for="address" class="col-md-8 control-label">{{$accounts->address}}</label>
                            @endif
                            <label for="username" class="col-md-4 control-label">รหัสบัตรประชาชน :</label>
                            <label for="username" class="col-md-8 control-label">{{ $accounts->user->username }}</label>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel-profile">
                <div class="heading">ข้อมูลบริษัท</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('accounts.show', $accounts->id) }}">

                        {{ csrf_field() }}
<!--
                            <label for="employeeID" class="col-md-5 control-label" >EmployeeID :</label>
                            <label for="employeeID" class="col-md-7 control-label" >{{$accounts->employeeID}}</label> -->

                            @if ($accounts->department_id == null)
                            <label for="departmentName" class="col-md-5 control-label">แผนก :</label>
                            <label for="departmentName" class="col-md-7 control-label"> a/n </label>
                            @endif

                            @if ($accounts->designation_id == null)
                            <label for="designationName" class="col-md-5 control-label">Designation :</label>
                            <label for="designationName" class="col-md-7 control-label"> a/n </label>
                            @endif

                            @if ($accounts->department_id != null)
                            <label for="departmentName" class="col-md-5 control-label">แผนก :</label>
                            <label for="departmentName" class="col-md-7 control-label">{{$accounts->department->departmentName}}</label>
                            @endif
                            @if ($accounts->designation_id != null)
                            <label for="designationName" class="col-md-5 control-label">Designation :</label>
                            <label for="designationName" class="col-md-7 control-label">{{$accounts->designation->designationName}}</label>
                            @endif

                            <label for="hiredDate" class="col-md-5 control-label">วันที่จ้าง :</label>
                            <label for="hiredDate" class="col-md-7 control-label">{{$accounts->hiredDate}}</label>

                            <label for="salary" class="col-md-5 control-label">ค่าจ้าง :</label>
                            <label for="salary" class="col-md-7 control-label">{{$accounts->salary}}</label>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel-profile">
                <div class="heading">Bank Account</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('accounts.show', $accounts->id) }}">


                          @if ($accounts->bankaccount->account_name == null)
                          <label for="account_name" class="col-md-6 control-label" >Account Name :</label>
                          <label for="account_name" class="col-md-6 control-label" >a/n</label>
                          @endif
                          @if ($accounts->bankaccount->account_number == null)
                          <label for="account_number" class="col-md-6 control-label">Account Number :</label>
                          <label for="Genaccount_numberder" class="col-md-6 control-label">a/n</label>
                          @endif
                          @if ($accounts->bankaccount->bank_name == null)
                          <label for="bank_name" class="col-md-6 control-label">Bank Name :</label>
                          <label for="bank_name" class="col-md-6 control-label">a/n</label>
                          @endif

                            @if ($accounts->bankaccount->account_name != null)
                            <label for="account_name" class="col-md-6 control-label" >Account Name :</label>
                            <label for="account_name" class="col-md-6 control-label" >{{$accounts->bankaccount->account_name}}</label>
                            @endif
                            @if ($accounts->bankaccount->account_number != null)
                            <label for="account_number" class="col-md-6 control-label">Account Number :</label>
                            <label for="Genaccount_numberder" class="col-md-6 control-label">{{$accounts->bankaccount->account_number}}</label>
                            @endif
                            @if ($accounts->bankaccount->bank_name != null)
                            <label for="bank_name" class="col-md-6 control-label">Bank Name :</label>
                            <label for="bank_name" class="col-md-6 control-label">{{$accounts->bankaccount->bank_name}}</label>
                            @endif


                    </form>
                </div>
            </div>


</div>
</div>
@endsection
@section('script')
  <script type="text/javascript">

    $('#selectCutoff').on('click',function(){
      $('#selectCut').modal('show')
    });

    $('#select').on('click',function(){
      $('#selectCutP').modal('show')
    });

  </script>



@endsection
