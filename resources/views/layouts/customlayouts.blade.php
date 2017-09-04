<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HR</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/bec5115d64.js"></script>
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.css">
    @yield('style')
</head>
<body>

<div id="wrapper">
  <div class="overlay"></div>
    <!-- sidebar -->
    <div class="sidebar-page">
      <ul class="sidebar-nav">
          <li class="sidebar-brand">
             <a href="/home">
                ระบบจัดสรรบุคลากรบีบี
             </a>
         </li>
          @if (Auth::check())
                @can('view_accounts')
                    <li class="{{ Request::is('accountinfo*') ? 'active' : '' }}">
                        <a href="{{ route('accounts.index') }}">
                             บัญชีผู้ใช้
                        </a>
                    </li>
                @endcan



                          @can('view_cutoff')
                          <li class="{{ Request::is('cutoff*') ? 'active' : '' }}">
                              <a href="{{ route('cutoff.index') }}">
                                  ช่วงเวลาทำงาน
                              </a>
                          </li>
                          @endcan


                @can('view_absences')
                <li class="{{ Request::is('absences*') ? 'active' : '' }}">
                    <a href="{{ route('absences.index') }}">
                        ลา/ขาด
                    </a>
                </li>
                @endcan

                @can('view_bankaccount')
                <li class="{{ Request::is('bankaccount*') ? 'active' : '' }}">
                    <a href="{{ route('bankaccount.index') }}">
                        บัญชีธนาคาร
                    </a>
                </li>
                @endcan

                @can('view_pay')
                <li class="{{ Request::is('pay*') ? 'active' : '' }}">
                    <a href="{{ route('pay.index') }}">
                        การจ่ายยอด
                    </a>
                </li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">แผนก <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li class="dropdown-header">v</li>
                          @can('view_department')
                          <li class="{{ Request::is('department*') ? 'active' : '' }}">
                              <a href="{{ route('department.index') }}">
                                  แผนก
                              </a>
                          </li>
                          @endcan

                          @can('view_designation')
                          <li class="{{ Request::is('designation*') ? 'active' : '' }}">
                              <a href="{{ route('designation.index') }}">
                                  ตำแหน่ง
                              </a>
                          </li>
                          @endcan
                        </ul>
                      </li>

              <!-- @can('view_events')
              <li class="{{ Request::is('events*') ? 'active' : '' }}">
                  <a href="{{ route('events.index') }}">
                      Event
                  </a>
              </li>
              @endcan

              @can('view_holidays')
              <li class="{{ Request::is('holidays*') ? 'active' : '' }}">
                  <a href="{{ route('holidays.index') }}">
                      Holidays
                  </a>
              </li>
              @endcan -->
              <!-- <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Trainingprogram <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Dropdown heading</li>
                        @can('view_trainingprogram')
                        <li class="{{ Request::is('trainingprogram*') ? 'active' : '' }}">
                            <a href="{{ route('trainingprogram.index') }}">
                                Trainingprogram
                            </a>
                        </li>
                        @endcan

                        @can('view_training')
                        <li class="{{ Request::is('training*') ? 'active' : '' }}">
                            <a href="{{ route('training.index') }}">
                                Training
                            </a>
                        </li>
                        @endcan
                      </ul>
                    </li> -->

              <!-- @can('view_awards')
              <li class="{{ Request::is('awards*') ? 'active' : '' }}">
                  <a href="{{ route('awards.index') }}">
                      Awards
                  </a>
              </li>
              @endcan -->

              <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการการลา<span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">v</li>

                        @can('view_leaves')
                        <li class="{{ Request::is('leaves*') ? 'active' : '' }}">
                            <a href="{{ route('leaves.index') }}">
                                ลางาน
                            </a>
                        </li>
                        @endcan

                        @can('view_leavestype')
                        <li class="{{ Request::is('leavestype*') ? 'active' : '' }}">
                            <a href="{{ route('leavestype.index') }}">
                                ชนิดของการลางาน
                            </a>
                        </li>
                        @endcan

                      </ul>
                    </li>


              @can('view_nationality')
              <li class="{{ Request::is('nationality*') ? 'active' : '' }}">
                  <a href="{{ route('nationality.index') }}">
                      สัญชาติ
                  </a>
              </li>
              @endcan

              @can('view_roles')
                  <li class="{{ Request::is('roles*') ? 'active' : '' }}">
                      <a href="{{ route('roles.index') }}">
                          บทบาท
                      </a>
                  </li>
              @endcan
              @endif
          @endif
      </ul>
    </div>
  <div class="content-page-warpper">
    <div class="nav nav-header navbar-static-top ">
      <div class="container-fluid box">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
                      <span class="hamb-top"></span>
                      <span class="hamb-middle"></span>
                      <span class="hamb-bottom"></span>
                    </button>


                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'HR') }}
                    </a> -->


                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-login"><a href="{{ route('login') }}">ลงชื่อเข้าใช้</a></li>

                            <li class="nav-login"><a href="{{ route('register') }}">สมัคร</a></li>
                        @else

                        @can('view_roles')


                           @endcan

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative;">
                                      <!-- <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px; border-radius:50%;"> -->
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            ลงชื่อออก
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                </div>
            </div>
            <div class="container form-container">
                        <div id="flash-msg">
                            @include('flash::message')
                        </div>
                        @yield('content')
                    </div>
        </div>
</div>




    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/customjs.js') }}"></script>

    @stack('scripts')

    <script>
        $(function () {
            // flash auto hide
            $('#flash-msg .alert').not('.alert-danger, .alert-important').delay(6000).slideUp(500);
        })
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <link href="http://demo.expertphp.in/css/jquery.ui.autocomplete.css" rel="stylesheet">
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
    <script src="http://demo.expertphp.in/js/jquery-ui.min.js"></script>-->
      @yield('script')
</body>
</html>
