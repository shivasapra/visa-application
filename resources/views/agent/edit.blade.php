@extends('layouts.frontend')
@section('title')
Edit Agent
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
      <h3 class="content-header-title"><strong>Edit: {{$agent->name}}</strong></h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agents')}}">Agents</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agent.business',['id'=>$agent->id])}}">Agent Buisness</a></li>
          <li class="breadcrumb-item"><a href="{{route('agent.details',['id'=>$agent->id])}}">Agent Details</a></li>
          <li class="breadcrumb-item">Edit Details</li>
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
						<form action="{{route('update.agent',['id'=>$agent->id])}}" method='post' enctype="multipart/form-data">
							{{csrf_field()}}
							<!-- Step 1 -->
	                      
	                      	<fieldset>
	                      	<div class="row">
	                      		<div class="col-md-6">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" name='name' value="{{$agent->name}}" required class="form-control">
									</div>
								</div>
	                      		<div class="col-md-6">
									<div class="form-group">
										<label for="company">Company</label>
										<input type="text" name='company' value="{{$agent->company}}" required class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="text" name='mobile' value="{{$agent->mobile}}" required maxlength="10" minlength="10" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="designation">Designation</label>
										<input type="text" name='designation' value="{{$agent->designation}}" required class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
	                      		<div class="col-md-6">
									<div class="form-group">
										<label for="website">Website</label>
										<input type="text" name='website' value="{{$agent->website}}" required class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" name='email' value="{{$agent->email}}" required class="form-control">
									</div>
								</div>
							</div>
							</fieldset>

							<!-- Step 2 -->
							<fieldset>
								<div class="row">
	                      		<div class="col-md-6">
									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" name='address' value="{{$agent->address}}" required class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="state">State/UT</label>
										<input type="text" name='state' value="{{$agent->state}}" required class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
	                      		<div class="col-md-6">
									<div class="form-group">
										<label for="district">District</label>
										<input type="text" name='district' value="{{$agent->district}}" required class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="location">City</label>
										<input type="text" name='location' value="{{$agent->location}}" required class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="postal_code">Postal Code</label>
										<input type="text" name='postal_code' value="{{$agent->postal_code}}" required class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
	                      		<div class="col-md-6">
									<div class="form-group">
										<label for="college1">International College tie up-- 1</label>
										<input type="text" name='college1' value="{{$agent->college1}}" required class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="college2">International College tie up-- 2</label>
										<input type="text" name='college2' value="{{$agent->college2}}" required class="form-control">
									</div>
								</div>
							</div>
							{{-- <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="id_proof">Id Proof</label>
										<input type="file" name='id_proof' class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="license">License</label>
										<input type="file" name='license' class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="photo">photo</label>
										<input type="file" name='photo' class="form-control">
									</div>
								</div>
							</div> --}}
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_no">ID No.</label>
										<input type="text" name='id_no' value="{{$agent->id_no}}" required class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="license_no">License No.</label>
										<input type="text" name='license_no' value="{{$agent->license_no}}" required class="form-control">
									</div>
								</div>
							</div>
						</fieldset>
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