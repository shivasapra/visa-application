@extends('layouts.frontend')
@section('title')
Edit Student
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
	        <li class="breadcrumb-item"><a href="{{route('student.details',['id'=>$student->id])}}">Student's details</a></li>
	        <li class="breadcrumb-item">Edit student</li>
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
	                    <form action="{{route('student.update',['id'=>$student->id])}}" class="number-tab-steps wizard-circle" method="post">
	                    	@csrf
	                      <!-- Step 1 -->
	                      
	                      <fieldset>
	                      	<div class="row">
	                          <div class="col-md-12">
	                          	<div class="form-group">
	                              <label for="agent_id">Source:</label>
	                              <select class="custom-select form-control" id="eventType1"
	                              name="idd" required>
	                                @if($student->agent_id)
									<option value="{{$student->agent->id}}">{{$student->agent->name}}
									@elseif($student->social_id)
									<option value="{{$student->social->id}}">{{$student->social->social}}
									@endif
	                              </select>
	                            </div>
	                        </div>
	                    </div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            <div class="form-group">
									<label for="first_name" >First name</label>
									<input type="text" name='first_name' required class="form-control" value="{{$student->first_name}}">
								</div>
	                          	</div>
	                          	<div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="last_name" >Last name</label>
									<input type="text" name='last_name' required class="form-control" value="{{$student->last_name}}">
							  	</div>
							  	</div>
	                        </div>
	                        <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            <label for="email" >Email</label>
									<input type="email" name='email' required class="form-control" value="{{$student->email}}">
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="title" >Title</label><br>
										<select name="title" required class="form-control" >
										<option value="Mr." {{($student->title == 'Mr.')?"selected":" "}}>Mr.</option>
										<option value="Mrs." {{($student->title == 'Mrs.')?"selected":" "}}>Mrs.</option>
										<option value="Miss" {{($student->title == 'Miss')?"selected":" "}}>Miss</option>
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
	                              <label for="gender" >Gender</label><br>
									<select name="gender" required class="form-control" >
									 <option value="male" {{($student->gender == 'male')?"selected":" "}}>Male</option>
									 <option value="female" {{($student->gender == 'female')?"selected":" "}}>Female</option>
								</select>
	                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="first_language" >First Language</label>
								<input type="text" name='first_language' required class="form-control" value="{{$student->first_language}}">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="DOB">DOB</label>
									<input type="date" name='DOB' max="{{$date_today}}" required class="form-control" value="{{$student->DOB}}">
	                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="Mobile">Moblie</label>
								<input type="text" maxlength="10" minlength="10" name='Mobile' required class="form-control" value="{{$student->Mobile}}">
	                            </div>
	                        	</div>
	                        </div>
	                      </fieldset>

	                      <!-- Step 3 -->
	                      <fieldset>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <label for="address">address</label>
								<input type="text" name='address' required class="form-control" value="{{$student->address}}">
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="postal_code">Postal code</label>
								 <input type="text" name='postal_code' required  class="form-control" value="{{$student->postal_code}}">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="text-center"><h4>{{"Passport"}}</h4></div>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <label for="passport_no">Passport No.</label>
								<input type="text"  name='passport_no' required class="form-control" value="{{$student->passport_no}}">
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="passport_country">Place of issue</label>
								 <input type="text" name='passport_country' required  class="form-control" value="{{$student->passport_country}}">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <label for="passport_issue">Issued Date</label>
								<input type="date"  name='passport_issue' required class="form-control" value="{{$student->passport_issue}}">
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="passport_expire">Expire Date</label>
								 <input type="date" name='passport_expire' required  class="form-control" value="{{$student->passport_expire}}">
	                            </div>
	                        	</div>
	                        </div>
	                       </fieldset>
	                       <fieldset>
	                       		<div class="text-center"><h4>{{"Education"}}</h4></div>
	                       		<div class="row">
		                          <div class="col-md-6">
		                            <label for="tenth_percentage">10th Percentage</label>
									<input type="text"  name='tenth_percentage' required class="form-control" placeholder="eg. 90" value="{{$student->tenth_percentage}}">
		                            </div>
		                            <div class="col-md-6">
		                            <div class="form-group">
		                             <label for="twelveth_percentage">12th Percentage</label>
									 <input type="text" name='twelveth_percentage' required  class="form-control" placeholder="eg. 90" value="{{$student->twelveth_percentage}}">
		                            </div>
		                        	</div>
	                        	</div>
	                        	<div class="row">
		                          <div class="col-md-6">
		                            <label for="tenth_year">10th Passing year</label>
									<input type="text"  name='tenth_year' required class="form-control" value="{{$student->tenth_year}}">
		                            </div>
		                            <div class="col-md-6">
		                            <div class="form-group">
		                             <label for="twelveth_year">12th Passing year</label>
									 <input type="text" name='twelveth_year' required  class="form-control" value="{{$student->twelveth_year}}">
		                            </div>
		                        	</div>
	                        	</div>
	                        	<div class="row">
		                          <div class="col-md-6">
		                            <label for="tenth_board">10th Board</label>
									<input type="text"  name='tenth_board' required class="form-control" value="{{$student->tenth_board}}">
		                            </div>
		                            <div class="col-md-3">
		                            <div class="form-group">
		                             <label for="twelveth_board">12th Board</label>
									 <input type="text" name='twelveth_board' required  class="form-control" value="{{$student->twelveth_board}}">
		                            </div>
		                        	</div>
		                        	<div class="col-md-3">
		                            <div class="form-group">
		                             <label for="twelveth_stream">12th Stream</label>
									 <input type="text" name='twelveth_stream' required  class="form-control" value="{{$student->twelveth_stream}}">
		                            </div>
		                        	</div>
	                        	</div>
	                       </fieldset>
	                       <fieldset>
	                        	<div class="text-center"><h4>{{"Language Test"}}</h4></div>
	                       		<div class="row">
		                          <div class="col-md-6">
		                            <label for="test">English language Test</label>
									<input type="text"  name='test' required class="form-control" value="{{$student->test}}">
		                            </div>
		                            <div class="col-md-6">
		                            <div class="form-group">
		                             <label for="test_date">Test Date</label>
									 <input type="date" name='test_date' required class="form-control" value="{{$student->test_date}}">
		                            </div>
		                        	</div>
	                        	</div>
	                        	<div class="row">
		                          <div class="col-md-6">
		                            <label for="test_remarks">Remarks</label>
									<input type="text"  name='test_remarks' class="form-control" value="{{$student->test_remarks}}">
		                            </div>
		                            <div class="col-md-6">
		                            <div class="form-group">
		                             <label for="test_score">Test Score</label>
									 <input type="text" name='test_score' class="form-control" value="{{$student->test_score}}">
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
  {{-- <script>

  	var series = [
  				@foreach($agents as $agent)
				{name: 'agent', product: '{{$agent->name}}'},
				@endforeach
				@foreach($socials as $social)
				{name: 'social', product: 'facebook'},
				@endforeach
				]

	$(".company").change(function(){
	    var company = $(this).val();
	    var options =  '<option value=""><strong>Products</strong></option>'; //create your "title" option
	    $(series).each(function(index, value){ //loop through your elements
	        if(value.name == company){ //check the company
	            options += '<option value="'+value.product+'">'+value.product+'</option>'; //add the option element as a string
	        }
	    });

	    $('.product').html(options); //replace the selection's html with the new options
	});
  </script> --}}
  <!-- END PAGE LEVEL JS-->
@endsection