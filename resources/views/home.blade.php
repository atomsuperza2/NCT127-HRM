@extends('layouts.customlayouts')

@section('content')
<div class="container form-container">
    <div class="row">
        <div class="col-md-12 ">

            <div class="panel-regis">
                <div class="heading">Authentication Details</div>

                <div class="panel-body">



          <div class="col-md-12">
          <div class="form-group">
              <div class="col-md-2 text-center">
                <img src="/uploads/avatars/{{Auth::user()->account_info->avatar}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
{{Auth::user()->account_info->name}}



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
                        <div class="heading"> Personal Detail</div>

                        <div class="panel-body">


                                {{ csrf_field() }}

                                    <label for="birthday" class="col-md-4 control-label" >Birth day :</label>
                                    <label for="birthday" class="col-md-8 control-label" align="left">{{ Auth::user()->account_info->birthday }}</label>

                                    <label for="Gender" class="col-md-4 control-label">Gender :</label>
                                    <label for="Gender" class="col-md-8 control-label">{{Auth::user()->account_info->Gender}}</label>

                                    <label for="email" class="col-md-4 control-label">E-Mail :</label>
                                    <label for="email" class="col-md-8 control-label">{{Auth::user()->account_info->email}}</label>
                                    @if (Auth::user()->account_info->phone == null)
                                    <label for="departmentName" class="col-md-5 control-label">Phone :</label>
                                    <label for="departmentName" class="col-md-7 control-label"> n/a </label>
                                    @endif
                                    @if (Auth::user()->account_info->phone != null)
                                    <label for="phone" class="col-md-4 control-label">Phone :</label>
                                    <label for="phone" class="col-md-8 control-label">{{Auth::user()->account_info->phone}}</label>
                                    @endif
                                    @if (Auth::user()->account_info->address == null)
                                    <label for="departmentName" class="col-md-5 control-label">Address :</label>
                                    <label for="departmentName" class="col-md-7 control-label"> n/a </label>
                                    @endif
                                    @if (Auth::user()->account_info->address != null)
                                    <label for="address" class="col-md-4 control-label">Address :</label>
                                    <label for="address" class="col-md-8 control-label">{{Auth::user()->account_info->address}}</label>
                                    @endif
                                    <label for="username" class="col-md-4 control-label">ID card :</label>
                                    <label for="username" class="col-md-8 control-label">{{ Auth::user()->account_info->user->username }}</label>


                            </form>
                        </div>
                    </div>
                </div>



                <div class="col-md-4">

                    <div class="panel-profile">
                        <div class="heading">Company Detail</div>

                        <div class="panel-body">

                                {{ csrf_field() }}

                                    <label for="employeeID" class="col-md-5 control-label" >EmployeeID :</label>
                                    <label for="employeeID" class="col-md-7 control-label" >{{Auth::user()->account_info->employeeID}}</label>

                                    @if (Auth::user()->account_info->department_id == null)
                                    <label for="departmentName" class="col-md-5 control-label">Department :</label>
                                    <label for="departmentName" class="col-md-7 control-label"> n/a </label>
                                    @endif

                                    @if (Auth::user()->account_info->designation_id == null)
                                    <label for="designationName" class="col-md-5 control-label">Designation :</label>
                                    <label for="designationName" class="col-md-7 control-label"> n/a </label>
                                    @endif

                                    @if (Auth::user()->account_info->department_id != null)
                                    <label for="departmentName" class="col-md-5 control-label">Department :</label>
                                    <label for="departmentName" class="col-md-7 control-label">{{Auth::user()->account_info->department->departmentName}}</label>
                                    @endif
                                    @if (Auth::user()->account_info->designation_id != null)
                                    <label for="designationName" class="col-md-5 control-label">Designation :</label>
                                    <label for="designationName" class="col-md-7 control-label">{{Auth::user()->account_info->designation->designationName}}</label>
                                    @endif

                                    <label for="hiredDate" class="col-md-5 control-label">Date Hired :</label>
                                    <label for="hiredDate" class="col-md-7 control-label">{{Auth::user()->account_info->hiredDate}}</label>

                                    <label for="salary" class="col-md-5 control-label">Salary :</label>
                                    <label for="salary" class="col-md-7 control-label">{{Auth::user()->account_info->salary}}</label>




                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">

                    <div class="panel-profile">
                        <div class="heading">Bank Account</div>

                        <div class="panel-body">



                                  @if (Auth::user()->account_info->bankaccount->account_name == null)
                                  <label for="account_name" class="col-md-6 control-label" >Account Name :</label>
                                  <label for="account_name" class="col-md-6 control-label" >n/a</label>
                                  @endif
                                  @if (Auth::user()->account_info->bankaccount->account_number == null)
                                  <label for="account_number" class="col-md-6 control-label">Account Number :</label>
                                  <label for="Genaccount_numberder" class="col-md-6 control-label">n/a</label>
                                  @endif
                                  @if (Auth::user()->account_info->bankaccount->bank_name == null)
                                  <label for="bank_name" class="col-md-6 control-label">Bank Name :</label>
                                  <label for="bank_name" class="col-md-6 control-label">n/a</label>
                                  @endif

                                    @if (Auth::user()->account_info->bankaccount->account_name != null)
                                    <label for="account_name" class="col-md-6 control-label" >Account Name :</label>
                                    <label for="account_name" class="col-md-6 control-label" >{{Auth::user()->account_info->bankaccount->account_name}}</label>
                                    @endif
                                    @if (Auth::user()->account_info->bankaccount->account_number != null)
                                    <label for="account_number" class="col-md-6 control-label">Account Number :</label>
                                    <label for="Genaccount_numberder" class="col-md-6 control-label">{{Auth::user()->account_info->bankaccount->account_number}}</label>
                                    @endif
                                    @if (Auth::user()->account_info->bankaccount->bank_name != null)
                                    <label for="bank_name" class="col-md-6 control-label">Bank Name :</label>
                                    <label for="bank_name" class="col-md-6 control-label">{{Auth::user()->account_info->bankaccount->bank_name}}</label>
                                    @endif





                            </form>
                        </div>
                    </div>
                </div>
                  </div>
          </div>

@endsection
