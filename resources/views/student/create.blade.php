@extends('layouts.frontend')
@section('title')
Add Student
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
@section('header')
    <div class="content-header row">
	<div class="content-header col-md-6 col-12 mb-1">
    	<h3 class="content-header-title"><strong>Students</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('students')}}">Students</a>
	        </li>
	        <li class="breadcrumb-item">Add Student</li>
	      </ol>
	    </div>
	  </div>
	</div>
@stop
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

    <div class="content-body">
	    <section id="number-tabs">
	          <div class="row">
	            <div class="col-12">
	              <div class="card">
	                <div class="card-content collapse show">
	                  <div class="card-body">
	                    <form action="{{route('students.store')}}" class="number-tab-steps wizard-circle" method="post">
	                    	@csrf
	                      <!-- Step 1 -->
	                      
	                      <fieldset>
	                      	<div class="row">
	                            <div class="col-md-12">
	                            	<div class="form-group">
									<label for="agent_id">Select agent</label><br>
									<select name="agent_id" class="form-control" >
										@foreach( $agents as $agent)
										 <option value="{{$agent->id}}">{{$agent->name}}</option>
										@endforeach
									</select>
								</div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            <div class="form-group">
									<label for="first_name">First name</label>
									<input type="text" name='first_name' class="form-control">
								</div>
	                          	</div>
	                          	<div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="last_name">Last name</label>
									<input type="text" name='last_name' class="form-control">
							  	</div>
							  	</div>
	                        </div>
	                        <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            <label for="email">Email</label>
									<input type="email" name='email' class="form-control">
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="title">Title</label><br>
										<select name="title" class="form-control" >
										<option value="Mr." >Mr.</option>
										<option value="Mrs." >Mrs.</option>
										<option value="Miss" >Miss</option>
									    </select>
		                            </div>
		                        </div>
	                        </div>
	                        	           
	                      </fieldset>
	                      <!-- Step 2 -->
	                      
	                      <fieldset>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="gender">Gender</label><br>
									<select name="gender" class="form-control" >
									 <option value="male" >Male</option>
									 <option value="female" >Female</option>
								</select>
	                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="first_language">First Language</label>
								<input type="text" name='first_language' class="form-control">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="DOB">DOB</label>
									<input type="text" name='DOB' placeholder="dd/mm/yyyy" class="form-control">
	                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="Mobile">Moblie</label>
								<input type="text"  name='Mobile' class="form-control">
	                            </div>
	                        	</div>
	                        </div>
	                      </fieldset>

	                      <!-- Step 3 -->
	                      <fieldset>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <label for="address">address</label>
								<input type="text"  name='address' class="form-control">
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="postal_code">Postal code</label>
								<input type="text" name='postal_code'  class="form-control">
	                            </div>
	                        	</div>
	                        </div>
	                       </fieldset>
	                      	<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Add student</button>
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


	{{-- @if(count($errors)>0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li class="list_group-item text-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	@endif




	<div class="card-header">Create a new student</div>
		<div class="card-body">
			<form action="{{route('students.store')}}" method='post'>
				{{csrf_field()}}
				<div class="form-group">
				<label for="agent_id">Select agent</label><br>
				<select name="agent_id" class="form-control" >
					@foreach( $agents as $agent)
					 <option value="{{$agent->id}}">{{$agent->name}}</option>
					@endforeach
				</select>
				</div>
				<div class="form-group">
					<label for="first_name">First name</label>
					<input type="text" name='first_name' class="form-control">
				</div>
				<div class="form-group">
					<label for="last_name">Last name</label>
					<input type="text" name='last_name' class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name='email' class="form-control">
				</div>
				<div class="form-group">
					<label for="title">Title</label><br>
					<select name="title" class="form-control" >
					 <option value="Mr." >Mr.</option>
					 <option value="Mrs." >Mrs.</option>
					 <option value="Miss" >Miss</option>
				</select>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label><br>
					<select name="gender" class="form-control" >
					 <option value="male" >Male</option>
					 <option value="female" >Female</option>
				</select>
				</div>
				<div class="form-group">
					<label for="first_language">First Language</label>
					<input type="text" name='first_language' class="form-control">
				</div>
				<div class="form-group">
					<label for="DOB">DOB</label>
					<input type="text" name='DOB' placeholder="dd/mm/yyyy" class="form-control">
				</div>
				<div class="form-group">
					<label for="Mobile">Moblie</label>
					<input type="text" name='Mobile' class="form-control">
				</div>
				<div class="form-group">
					<label for="address">address</label>
					<input type="text" name='address' class="form-control">
				</div>
				<div class="form-group">
					<label for="postal_code">Postal code</label>
					<input type="text" name='postal_code' class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add user</button>
					</div>
				</div>
				
			</form>
		</div> --}}
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