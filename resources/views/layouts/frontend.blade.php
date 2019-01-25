<?php
use App\todo;
use Carbon\carbon;
$yesterday_date = Carbon::now()->addDays(-1)->toDateString();
$missed_todos = todo::where('date',$yesterday_date)->where('status',3)->get();
$missed_todos_five = todo::where('date',$yesterday_date)->where('status',3)->take(5)->get();
?>

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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBDkKetQwosod2SZ7ZGCpxuJdxY3kxo5Po"
  type="text/javascript"></script>
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <script src="{{asset('js/toastr.min.js')}}"></script>
  


  <link rel="apple-touch-icon" href="{{asset('app/front/app-assets/images/ico/apple-icon-120.png')}}">
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('app/front/app-assets/images/ico/favicon.ico')}}">
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  {{-- <link href="{{asset('app/front/https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i')}}"
  rel="stylesheet"> --}}
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
  {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
  swal("Hello world!");
  </script> --}}
  <!-- END Custom CSS-->
  @yield('css')
  <style type="text/css">
    body .navbar-dark .vertical-menu .vertical-layout .main-menu{
      font-family: "Roboto", "Helvetica Neue", Helvetica, Arial, sans-serif !important;
    }

  </style>
</head>

<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
  data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark navbar-border">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item">
            <a class="navbar-brand" href="{{route('home')}}">
              <img class="brand-logo" alt="stack admin logo" src="{{asset('app/front/app-assets/images/logo/stack-logo.png')}}">
              <h2 class="brand-text">Adept User</h2>
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
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up">{{$missed_todos->count()}}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                  <h6 class="dropdown-header m-0">
                    <span class="grey darken-2">Notifications</span>
                    <span class="notification-tag badge badge-default badge-danger float-right m-0">{{$missed_todos->count()}} New</span>
                  </h6>
                </li>
                @if($missed_todos->count()>0)
                @foreach($missed_todos_five as $missed_todo)
                @csrf
                <li class="scrollable-container media-list">
                  <a href="{{route('todos',['target_date'=>$missed_todo->date])}}">
                    <input type="text" name="date" hidden value="{{$missed_todo->date}}">
                    <div class="media">
                      <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                      <div class="media-body">
                        <h6 class="media-heading">Todo: {{$missed_todo->date}}</h6>
                        <p class="notification-text font-small-3 text-muted">{{$missed_todo->activity}}</p>
                        <small>
                          <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">{{$missed_todo->time}} <span class="text-danger">{{'Missed'}}</span></time>
                        </small>
                      </div>
                    </div>
                  </a>
                </li>
              
                @endforeach
                @endif
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="{{route('todos',['target_date'=>$yesterday_date])}}">Read all notifications</a></li>
              </ul>
            </li>
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
  <div class="main-menu menu-fixed menu-dark menu-accordion" data-scroll-to-active="true">
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
        <div class="dropdown-divider"></div>
        <li class=" navigation-header">
         <i class="ft-layout"></i> Reports
        </li>
        <div class="dropdown-divider"></div>
        
        <li><a class="menu-item" href="{{route('agent.report')}}"><i class="fa fa-file menu-icon"></i>Agent Report</a>
        </li>
        <li><a class="menu-item" href="{{route('applicationFee.report')}}"><i class="fa fa-file menu-icon"></i>Application Fee Report</a>
          <li><a class="menu-item" href="{{route('LOA.report')}}"><i class="fa fa-file menu-icon"></i>LOA Report</a>
        </li>
        <li><a class="menu-item" href="{{route('offer_letter.report')}}"><i class="fa fa-file menu-icon"></i>Offer Letter Report</a>
        </li>
        <li><a class="menu-item" href="{{route('refund.report')}}"><i class="fa fa-file menu-icon"></i>Refund Report</a>
        </li>
        <li><a class="menu-item" href="{{route('tuitionFee.report')}}"><i class="fa fa-file menu-icon"></i>Tuition Fee Report</a>
        </li>
        <li><a class="menu-item" href="{{route('visa.report')}}"><i class="fa fa-file menu-icon"></i>Visa Report</a>
        </li>
        {{-- <li><a class="menu-item" href="{{route('lead.report')}}"><i class="fa fa-file menu-icon"></i>Lead Report</a>
        </li> --}}
          
      </ul>
    </div>
  </div>

  <div class="app-content content"  style="background-color:#D3D3D3;">
    <div class="content-wrapper">
      @yield('header')
      <div class="content-body">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <footer class="footer footer-static footer-dark navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-right d-block d-md-inline-block d-none d-lg-block">Designed and Developed by <a href="https://www.himsoftsolution.com">Him Soft Solution Chandigarh</a></span>
    </p>
    {{-- <img src="{{asset('images/himsoft.jpg')}}" alt="" height="20px" width="20px" style="border-radius: 50px"> --}}
  </footer>
  
   <!-- BEGIN VENDOR JS-->
  <script src="{{asset("app/front/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("app/front/app-assets/vendors/js/charts/gmaps.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/forms/icheck/icheck.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/extensions/jquery.knob.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/raphael-min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/morris.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/jquery.sparkline.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/extensions/unslider-min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/charts/echarts/echarts.js")}}" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset("app/front/app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN  PAGE LEVEL JS-->
  {{-- <script src="{{asset("app/front/app-assets/js/scripts/pages/dashboard-fitness.js")}}" type="text/javascript"></script> --}}
  {{-- <script src="{{ asset('/js/app.js') }}"></script> --}}
  
  <!-- END PAGE LEVEL JS-->
  
  
  <script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}")
    @endif
    @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}")
    @endif
    @if(Session::has('danger'))
    toastr.danger("{{Session::get('danger')}}")
    @endif
    @if(Session::has('warning'))
    toastr.warning("{{Session::get('warning')}}")
    @endif
  </script>
  @yield('js')

</body>
</html>