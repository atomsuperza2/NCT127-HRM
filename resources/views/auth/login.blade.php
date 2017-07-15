@extends('layouts.loginlayouts')


@section('content')


      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="row">
                    <form class="panel-main-box" role="form" method="POST" action="{{ route('login') }}">
                      <div class="panel-header">Login</div>
                        {{ csrf_field() }}
                        <div class="group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <input id="username" class="login-field" type="text"  name="username" value="{{ old('username') }}" placeholder="Username" required>


                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>
                          <div class="group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" class="login-field"  type="password"  name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div> -->
                            <button type="submit" class="button buttonBlue">Login
                                <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
                              </button>
                                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
