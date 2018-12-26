@extends('layouts.frontend')
@section('title')
Edit Profile
@stop
@section('css')
	<!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/vendors.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/pickers/daterange/daterangepicker.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/vendors/css/pickers/pickadate/pickadate.css")}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/menu/menu-types/vertical-menu.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/plugins/forms/wizard.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/plugins/pickers/daterange/daterange.css")}}">
  <!-- END Page Level CSS-->

  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/app.css")}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/assets/css/style.css")}}">
  <!-- END Custom CSS-->
@endsection
@section('content')
	@if(count($errors)>0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li class="list_group-item text-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	@endif

	<div class="content-header text-center">
    	<h3 class="content-header-title">Update Profile</h3>
    </div>
    <div class="content-body">
	    <section id="number-tabs">
	          <div class="row">
	            <div class="col-12">
	              <div class="card">
	                <div class="card-content collapse show">
	                  <div class="card-body">
	                  	<form action="{{route('update.profile')}}" class="number-tab-steps 	wizard-circle" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	
		                    <div class="container text-center">
		                    	<img 
		                    	@if(Auth::user()->avatar)
			                      src="{{asset(Auth::user()->avatar)}}"
			                    @else
			                      src="{{asset('app/images/user-placeholder.jpg')}}"
			                    @endif 
			                    alt="avatar" height="300px" width="300px" style="border-radius:20px">
		                    </div>
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name='name' value="{{$user->name}}" class="form-control">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name='email' value="{{$user->email}}" class="form-control">
							</div>
							<div class="form-group">
								<label for="password">New Password:</label>
								<input type="password" name='password' class="form-control">
							</div>
							<div class="form-group">
								<label for="avatar">Image</label>
								<input type="file" name='avatar' class="form-control">
							</div>
	                    	<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Update</button>
							</div>
							</div>
							
	                    </form>
	                  </div>
	              </div>
	          </div>
	      </div>
	  </div>
	</section>
	</div>
@stop
@section('js')
	<!-- BEGIN VENDOR JS-->
  <script src="{{asset("app/front/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="{{asset("app/front/app-assets/vendors/js/extensions/jquery.steps.min.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js")}}"
  type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/pickers/daterange/daterangepicker.js")}}"
  type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/pickers/pickadate/picker.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/pickers/pickadate/picker.date.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/vendors/js/forms/validation/jquery.validate.min.js")}}"
  type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset("app/front/app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="{{asset("app/front/app-assets/js/scripts/forms/wizard-steps.js")}}" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
@endsection