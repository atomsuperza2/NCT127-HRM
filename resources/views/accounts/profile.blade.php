@extends('layouts.customlayouts')
@include('accounts.selectCutoff')
@section('content')

  <div class="row">
  <div class="col-md-12 ">
  <div class="form-group">
    <ol class="breadcrumb">
      <li><a href="/accounts">Accounts</a></li>
      <li class="active">Account profile</li>
    </ol>
        <div class="panel-regis">
            <div class="heading">Profile</div>
            <div class="panel-body">

              <div class="col-md-4">
                  <img src="/uploads/avatars/{{$accounts->avatar}}" style="width:150px; height:150px; float:center; border-radius:50%;">
                  <br><br>
                  <label for="name">Employee :</label>
                  <label for="name">{{$accounts->name}}</label><br>
                  <label for="id">ID :</label>
                  <label for="id">{{$accounts->id}}</label>
              </div>
              <div class="col-md-8">
                <div class="btn-group" role="group" aria-label="...">
                <a class="btn btn-primary" href="{{ route('accounts.edit', $accounts->id) }}">Edit profile</a>
                <a class="btn btn-primary" id="selectCutoff">Attendance</a>
                <a class="btn btn-primary" href="{{route('absences.usercreateabsences', $accounts->id) }}">Absences</a>
                <a class="btn btn-primary" href="{{ route('bankaccount.edit', $accounts->id) }}">Bank account</a>
                <a class="btn btn-primary" href="{{ route('awards.usercreateaward', $accounts->id)}}">Awards</a>
                <a class="btn btn-primary" href="{{ route('pay.usercreatepay', $accounts->id)}}">Pay</a>
                <a class="btn btn-primary" href="{{ route('training.usertraining', $accounts->id)}}">Training</a>
                <a class="btn btn-primary" href="{{ route('leaves.userleave', $accounts->id)}}">Leave</a>
              </div>
              <hr />
              <form enctype="multipart/form-data" action="{{ route('accounts.update_avatar', $accounts->id) }} " method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{csrf_token() }}">
                <br />
                <input type="submit" class="btn btn-sm btn-primary">
              </form>
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
                <div class="heading">Personal Detail</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('accounts.show', $accounts->id) }}">

                        {{ csrf_field() }}

                            <label for="birthday" class="col-md-4 control-label" >Birth day :</label>
                            <label for="birthday" class="col-md-8 control-label" align="left">{{$accounts->birthday}}</label>

                            <label for="Gender" class="col-md-4 control-label">Gender :</label>
                            <label for="Gender" class="col-md-8 control-label">{{$accounts->Gender}}</label>

                            <label for="email" class="col-md-4 control-label">E-Mail :</label>
                            <label for="email" class="col-md-8 control-label">{{$accounts->email}}</label>
                            @if ($accounts->phone == null)
                            <label for="departmentName" class="col-md-5 control-label">Phone :</label>
                            <label for="departmentName" class="col-md-7 control-label"> a/n </label>
                            @endif
                            @if ($accounts->phone != null)
                            <label for="phone" class="col-md-4 control-label">Phone :</label>
                            <label for="phone" class="col-md-8 control-label">{{$accounts->phone}}</label>
                            @endif
                            @if ($accounts->address == null)
                            <label for="departmentName" class="col-md-5 control-label">Address :</label>
                            <label for="departmentName" class="col-md-7 control-label"> a/n </label>
                            @endif
                            @if ($accounts->address != null)
                            <label for="address" class="col-md-4 control-label">Address :</label>
                            <label for="address" class="col-md-8 control-label">{{$accounts->address}}</label>
                            @endif
                            <label for="username" class="col-md-4 control-label">ID card :</label>
                            <label for="username" class="col-md-8 control-label">{{ $accounts->user->username }}</label>


                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="panel-profile">
                <div class="heading">Company Detail</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="get" action="{{ route('accounts.show', $accounts->id) }}">

                        {{ csrf_field() }}
<!--
                            <label for="employeeID" class="col-md-5 control-label" >EmployeeID :</label>
                            <label for="employeeID" class="col-md-7 control-label" >{{$accounts->employeeID}}</label> -->

                            @if ($accounts->department_id == null)
                            <label for="departmentName" class="col-md-5 control-label">Department :</label>
                            <label for="departmentName" class="col-md-7 control-label"> a/n </label>
                            @endif

                            @if ($accounts->designation_id == null)
                            <label for="designationName" class="col-md-5 control-label">Designation :</label>
                            <label for="designationName" class="col-md-7 control-label"> a/n </label>
                            @endif

                            @if ($accounts->department_id != null)
                            <label for="departmentName" class="col-md-5 control-label">Department :</label>
                            <label for="departmentName" class="col-md-7 control-label">{{$accounts->department->departmentName}}</label>
                            @endif
                            @if ($accounts->designation_id != null)
                            <label for="designationName" class="col-md-5 control-label">Designation :</label>
                            <label for="designationName" class="col-md-7 control-label">{{$accounts->designation->designationName}}</label>
                            @endif

                            <label for="hiredDate" class="col-md-5 control-label">Date Hired :</label>
                            <label for="hiredDate" class="col-md-7 control-label">{{$accounts->hiredDate}}</label>

                            <label for="salary" class="col-md-5 control-label">Salary :</label>
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
</script>
@endsection
