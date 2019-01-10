<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>@yield('title')</title>
  <link rel="apple-touch-icon" href="{{asset('app/front/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('app/front/app-assets/images/ico/favicon.ico')}}">
  <link href="{{ asset('/css/toastr.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  <link href="{{asset('app/front/https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i')}}"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/vendors.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/forms/icheck/icheck.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/forms/icheck/custom.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/charts/morris.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/extensions/unslider.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/weather-icons/climacons.min.css")}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/app.css")}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/menu/menu-types/vertical-menu.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/colors/palette-climacon.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/colors/palette-gradient.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/fonts/simple-line-icons/style.min.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/fonts/meteocons/style.min.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/pages/users.css")}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/assets/css/style.css")}}">
  <!-- END Custom CSS-->
  @yield('css')
  
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
  data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-light navbar-border">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{route('home')}}">
              <img class="brand-logo" alt="stack admin logo" src="{{asset('app/front/app-assets/images/logo/stack-logo.png')}}">
              <h2 class="brand-text">Visa Application</h2>
            </a>
          </li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
          
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i></a></li>
         
            
        
          </ul>

          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="avatar avatar-online">
                  <img 
                    @if(Auth::user()->avatar)
                      src="{{asset(Auth::user()->avatar)}}"
                    @else
                      src="{{asset('app/images/user-placeholder.jpg')}}"
                    @endif 
                    alt="avatar"><i></i></span>
                <span class="user-name">{{ Auth::user()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('edit.profile')}}"><i class="ft-user"></i> Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('home') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      <i class="ft-power"> {{ __('Logout') }}</i>
                  </a>
              
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" navigation-header">
          Welcome {{ Auth::user()->name }} <i class="fa fa-power-off top-left-logout pull-right" data-toggle="tooltip" data-title="Logout" data-placement="right" 
       onclick="event.preventDefault();document.getElementById('logout-form').submit();"></i>
       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        </li>
        <div class="dropdown-divider"></div><br>
        <li class=" nav-item"><a href="{{route('home')}}"><i class="ft-home"></i><span data-i18n="">Dashboard</span></a></li>
        <li class="menu-item">
          <a href="{{route('agents')}}" aria-expanded="false"><i class="fa fa-user-o menu-icon"></i>
          Agents</a>
        </li>
        <li class="menu-item">
          <a href="{{route('leads')}}" aria-expanded="false"><i class="fa fa-tty menu-icon"></i>
          Leads</a>
        </li>    
        <li class="menu-item">
          <a href="{{route('students')}}" aria-expanded="false"><i class="fa fa-user-o menu-icon"></i>
          Students</a>
        </li>
        <li class="menu-item">
          <a href="{{route('contracts')}}" aria-expanded="false"><i class="fa fa-file menu-icon"></i>

          Contracts</a>
        </li>
      </ul>
    </div>
  </div>

  <div class="app-content content">
    <div class="content-wrapper">
      @yield('header')
      <div class="content-body">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Designed and Developed by <a href="https://www.himsoftsolution.com">Him Soft Solution Chandigarh</a></span>
    </p>
    {{-- <img src="{{asset('images/himsoft.jpg')}}" alt="" height="20px" width="20px" style="border-radius: 50px"> --}}
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po"
  type="text/javascript"></script>
   <!-- BEGIN VENDOR JS-->
  <script src="{{asset("app/front/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("app/front/app-assets/vendors/js/charts/gmaps.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/extensions/jquery.knob.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/raphael-min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/morris.min.j")}}s" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/jquery.sparkline.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/extensions/unslider-min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/echarts/echarts.js")}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset("app/front/app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset("app/front/app-assets/js/scripts/pages/dashboard-fitness.js")}}" type="text/javascript"></script>
  {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
    <script src="{{ asset('/js/toastr.min.js') }}"></script>
  <script>
        @if(Session::has('success'))
            toastr.success("{{Session::get('success')}}")
        @endif
        @if(Session::has('info'))
            toastr.info("{{Session::get('info')}}")
        @endif
  </script>
  <!-- END PAGE LEVEL JS-->
  @yield('js')

</body>
</html>