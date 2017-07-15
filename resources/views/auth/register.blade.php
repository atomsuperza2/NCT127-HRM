@extends('layouts.registerlayouts')

@section('content')
<div class="container form-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-regis">
                <div class="heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label for="name" class="col-md-4 control-label">Name</label>

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
                          <label for="birthday" class="col-md-4 control-label">Birth day</label>

                          <div class="col-md-6">
                              <input id="birthday" type="date" class="form-control" name="birthday" value="{{ old('birthday') }}" required autofocus>

                              @if ($errors->has('birthday'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('birthday') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                          <label for="Gender" class="col-md-4 control-label">Gender</label>

                          <div class="col-md-6">
                              <input id="Gender" type="text" class="form-control" name="Gender" value="{{ old('Gender') }}" required autofocus>

                              @if ($errors->has('Gender'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('Gender') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('employeeID') ? ' has-error' : '' }}">
                          <label for="employeeID" class="col-md-4 control-label">employeeID</label>

                          <div class="col-md-6">
                              <input id="employeeID" type="text" class="form-control" name="employeeID" value="{{ old('employeeID') }}" required>

                              @if ($errors->has('employeeID'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('employeeID') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('hiredDate') ? ' has-error' : '' }}">
                          <label for="hiredDate" class="col-md-4 control-label">Hired Date</label>

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
                          <label for="exitDate" class="col-md-4 control-label">Exit Date</label>

                          <div class="col-md-6">
                              <input id="exitDate" type="date" class="form-control" name="exitDate" value="{{ old('exitDate') }}" required>

                              @if ($errors->has('exitDate'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('exitDate') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('salary') ? ' has-error' : '' }}">
                          <label for="salary" class="col-md-4 control-label">Salary</label>

                          <div class="col-md-6">
                              <input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') }}" required>

                              @if ($errors->has('salary'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('salary') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                          <label for="username" class="col-md-4 control-label">ID card</label>

                          <div class="col-md-6">
                              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                              @if ($errors->has('username'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('username') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>


                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
