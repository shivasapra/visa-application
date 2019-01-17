@extends('layouts.frontend')
@section('title')
Convert Lead into Student
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
    	<h3 class="content-header-title">Converting lead into student</h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('leads')}}">leads</a>
	        </li>
	        <li class="breadcrumb-item">Convert Lead</li>
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
            <form action="{{route('convert.lead',['id'=>$lead->id])}}" class="number-tab-steps wizard-circle" method="post">
        	@csrf
	          <div class="row">
	            <div class="col-8">
	              <div class="card">
	                <div class="card-content collapse show">
	                  <div class="card-body">
	                      <!-- Step 1 -->
	                    <fieldset>
	                      	<div class="row">
	                          <div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="source">Source</label>
	                              <select class="custom-select form-control" id="first"
	                              name="source" required>
                                @if($lead->agent_id)
									<option value="agent">{{'agent'}}</option>
								@elseif($lead->social_id)
									<option value="social">{{'social'}}</option>
								@elseif($lead->third_party)
									<option value="third_party">{{'Other'}}</option>
								@endif
	                              </select>
	                            </div>
	                        </div>
	                        <div class="col-md-6" >
	                          	<div class="form-group" id="third">
	                          	@if($lead->agent_id or $lead->social_id)
	                          	<label for="idd">Select</label>
                          		<select class="custom-select form-control" id="first"
	                              name="idd" required>
								@if($lead->agent_id)
									<option value="{{$lead->agent->id}}">{{$lead->agent->name}}</option>
								@elseif($lead->social_id)
									<option value="{{$lead->social->id}}">{{$lead->social->social}}</option>
								@endif
								</select>
								@endif
								@if($lead->third_party)
								<label for="third_party">Name</label>
								<input type="text" name="third_party" required value="{{$lead->third_party}}" class="form-control">
								@endif
	                            </div>
	                        </div>
	                    	</div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            <div class="form-group">
									<label for="first_name" >First name</label>
									<input type="text" name='first_name' value="{{$lead->student_fname}}" required class="form-control">
								</div>
	                          	</div>
	                          	<div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="last_name" >Last name</label>
									<input type="text" name='last_name' required class="form-control" value="{{$lead->student_lname}}">
							  	</div>
							  	</div>
	                        </div>
	                        <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            <label for="email" >Email</label>
									<input type="email" name='email' required class="form-control" value="{{$lead->email}}">
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="title" >Title</label><br>
										<select name="title" required class="form-control" >
										<option value="Mr." >Mr.</option>
										<option value="Mrs." >Mrs.</option>
										<option value="Miss" >Miss</option>
									    </select>
		                            </div>
		                        </div>
	                        </div>   	           
	                    
	                        <div class="row">
	                          <div class="col-md-6">
	                            <div class="form-group">
	                            <label for="gender" >Gender</label><br>
								<select name="gender" required class="form-control" >
								 <option value="male" >Male</option>
								 <option value="female" >Female</option>
								</select>
	                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="first_language" >First Language</label>
								<input type="text" name='first_language' required class="form-control">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="DOB">DOB</label>
									<input type="date" name='DOB' max="{{$date_today}}" required class="form-control">
	                            </div>
	                            </div>
	                            <div class="col-md-6">
	                            <div class="form-group">
	                             <label for="Mobile">Moblie</label>
								<input type="text" maxlength="10" minlength="10" name='Mobile' required class="form-control" value="{{$lead->Mobile}}">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <label for="address">address</label>
								<input type="text" name='address' required class="form-control" value="{{$lead->address}}">
	                            </div>
	                            <div class="col-md-6">
	                            <label for="state">Statet/UT</label>
								<input type="text" name='state' required class="form-control" value="{{$lead->state}}">
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-md-6">
	                            <div class="form-group">
	                             <label for="district">District</label>
								 <input type="text" name='district' required  class="form-control" value="{{$lead->district}}">
	                            </div>
	                        	</div>
	                        	<div class="col-md-3">
	                            <div class="form-group">
	                             <label for="city">City</label>
								 <input type="text" name='city' required  class="form-control" value="{{$lead->city}}">
	                            </div>
	                        	</div>
	                            <div class="col-md-3">
	                            <div class="form-group">
	                             <label for="postal_code">Postal code</label>
								 <input type="text" name='postal_code' required  class="form-control" value="{{$lead->postal_code}}">
	                            </div>
	                        	</div>
	                        </div>
	                    </fieldset>
	                  </div>
	                </div>
	              </div>
	            
	          
	                      <!-- Step 2 -->
		            <div class="card">
		                <div class="card-content collapse show">
		                  <div class="card-body">
		                    <fieldset>
		                        	<div class="text-center"><h4>{{"Language Test"}}</h4></div>
		                       		<div class="row">
			                          <div class="col-md-3">
			                            <label for="test">English language Test</label>
										<select class="custom-select form-control" id="test"
			                              name="test" required>
			                              <option value="">{{'--select--'}}</option>
											<option value="ILETS">{{'ILETS'}}</option>
											<option value="others">{{'Others'}}</option>
			                              </select>
			                            </div>
			                            <div class="col-md-6" id="target"></div>
			                            <div class="col-md-3">
			                            <div class="form-group">
			                             <label for="test_date">Test Date</label>
										 <input type="date" name='test_date' required class="form-control">
			                            </div>
			                        	</div>
		                        	</div>
		                        	<div class="row">
			                          <div class="col-md-6">
			                            <label for="test_remarks">Remarks</label>
										<input type="text"  name='test_remarks' class="form-control">
			                            </div>
			                            <div class="col-md-6">
			                            <div class="form-group">
			                             <label for="test_score">Test Score</label>
										 <input type="text" name='test_score' class="form-control">
			                            </div>
			                        	</div>
		                        	</div>
		                    </fieldset>
		                    </div>
		                </div>
		            </div>
	            <div class="text-center">
              	<div class="form-group">
					<button class="btn btn-success text" type="submit">Add student</button>
				</div>
				</div>
	            </div>
	            
	          
	                      <!-- Step 3 -->
	          
		            <div class="col-4">
		              <div class="card">
		                <div class="card-content collapse show">
		                  <div class="card-body">
		                    <fieldset>
		                       		<div class="text-center"><h4>{{"Education"}}</h4></div>
		                       		<div class="row">
			                          <div class="col-md-6">
			                            <label for="tenth_percentage">10th Percentage</label>
										<input type="text"  name='tenth_percentage' required class="form-control" placeholder="eg. 90">
			                            </div>
			                            <div class="col-md-6">
			                            <div class="form-group">
			                             <label for="twelveth_percentage">12th Percentage</label>
										 <input type="text" name='twelveth_percentage' required  class="form-control" placeholder="eg. 90">
			                            </div>
			                        	</div>
		                        	</div>
		                        	<div class="row">
			                          <div class="col-md-6">
			                            <label for="tenth_year">10th Passing year</label>
										<input type="text"  name='tenth_year' required class="form-control">
			                            </div>
			                            <div class="col-md-6">
			                            <div class="form-group">
			                             <label for="twelveth_year">12th Passing year</label>
										 <input type="text" name='twelveth_year' required  class="form-control">
			                            </div>
			                        	</div>
		                        	</div>
		                        	<div class="row">
			                          <div class="col-md-6">
			                            <label for="tenth_board">10th Board</label>
										<input type="text"  name='tenth_board' required class="form-control">
			                            </div>
			                            <div class="col-md-6">
			                            <div class="form-group">
			                             <label for="twelveth_board">12th Board</label>
										 <input type="text" name='twelveth_board' required  class="form-control">
			                            </div>
			                        	</div>
			                        	<div class="col-md-12">
			                            <div class="form-group">
			                             <label for="twelveth_stream">12th Stream</label>
										 <input type="text" name='twelveth_stream' required  class="form-control">
			                            </div>
			                        	</div>
		                        	</div>
		                    </fieldset>
		                  </div>
		                </div>
		              </div>


		            <div id="education"></div>
                  	<div class="text-center">
						<button class="btn btn-success btn-sm" type="button" id="addeducation">Add Education</button>
					</div>
            
		            
		          
		                      <!-- Step 4 -->
		              <br><div class="card">
		                <div class="card-content collapse show">
		                  <div class="card-body">
		                    <fieldset>
		                        <div class="text-center"><h4>{{"Passport"}}</h4></div>
		                        <div class="row">
		                          <div class="col-md-6">
		                            <label for="passport_no">Passport No.</label>
									<input type="text"  name='passport_no' required class="form-control">
		                            </div>
		                            <div class="col-md-6">
		                            <div class="form-group">
		                             <label for="passport_country">Place of issue</label>
									 <input type="text" name='passport_country' required  class="form-control">
		                            </div>
		                        	</div>
		                        </div>
		                        <div class="row">
		                          <div class="col-md-12">
		                          	<div class="form-group">
		                            <label for="passport_issue">Issued Date</label>
									<input type="date"  name='passport_issue' required class="form-control">
		                            </div>
		                            </div>
		                        </div>
		                        <div class="row">
		                            <div class="col-md-12">
		                            <div class="form-group">
		                             <label for="passport_expire">Expire Date</label>
									 <input type="date" name='passport_expire' required  class="form-control">
		                            </div>
		                        	</div>
		                        </div>
		                    </fieldset>
		                  </div>
		                </div>
		              </div>
		            </div>
				
			</div>
            </form>
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




	<div class="card-header text-center"><strong>Converting lead into student</strong></div>
		<div class="card-body">
			<form action="{{route('convert.lead',['id'=>$lead->id])}}" method='post'>
				{{csrf_field()}}
				<div class="form-group">
				<label for="agent_id">Select agent</label><br>
				<select name="agent_id" class="form-control" >
					
					 <option value="{{$lead->agent_id}}" >{{$lead->agent->name}}</option>
					
				</select>
				</div>
				<div class="form-group">
					<label for="first_name">First name</label>
					<input type="text" value="{{$lead->student_fname}}" name='first_name' class="form-control">
				</div>
				<div class="form-group">
					<label for="last_name">Last name</label>
					<input type="text" value="{{$lead->student_lname}}" name='last_name' class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name='email' value="{{$lead->email}}" class="form-control">
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
					<input type="text" value="{{$lead->Mobile}}" name='Mobile' class="form-control">
				</div>
				<div class="form-group">
					<label for="address">address</label>
					<input type="text" value="{{$lead->address}}" name='address' class="form-control">
				</div>
				<div class="form-group">
					<label for="postal_code">Postal code</label>
					<input type="text" name='postal_code' value="{{$lead->postal_code}}" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add student</button>
					</div>
				</div>
				
			</form>
		</div>

 --}}
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
<script>
  $(document).ready(function(){
	    $('#test').on('change', function(){
	    	var test = this.value;
		    if (test == 'others'){
		    	var othervalue = '<div class="form-group"><label for="othervalue">Name:</label><input type="text" name="othervalue" required class="form-control"></div>';
		    	$('#target').html(othervalue);
		    }
		    if (test == 'ILETS'){
		    	var ilets ='<div class="form-group"><input type="text" name="listening" placeholder="listening" required class="form-control"></div><div class="form-group"><input type="text" name="reading" placeholder="reading" required class="form-control"></div><div class="form-group"><input type="text" name="writing" placeholder="writing" required class="form-control"></div><div class="form-group"><input type="text" name="speaking" placeholder="speaking" required class="form-control"></div>';
		    	$('#target').html(ilets);
		    }
		});
	});

  $(document).ready(function(){
    $("#addeducation").click(function(){
    	var education = '<div class="card"><div class="card-content collapse show"><div class="card-body"><div class="row"><div class="col-md-12"><label for="college_name[]">College/University Name:</label><input type="text"  name="college_name[]" required class="form-control"></div></div><div class="row"><div class="col-md-12"><label for="education[]">Education:</label><input type="text"  name="education[]" required class="form-control"></div></div><div class="row"><div class="col-md-6"><label for="percentage[]">Percentage:</label><input type="text"  name="percentage[]" required class="form-control"></div><div class="col-md-6"><label for="passing_year[]">Passing Year:</label><input type="text"  name="passing_year[]" required class="form-control"></div></div><div class="text-center"><input type="button" class="btn btn-danger btn-sm" value="Remove" onclick="SomeDeleteRowFunction(this);"></div></div></div></div></div></div></div>';
    	$("#education").append(education);  
    	});
	});

  function SomeDeleteRowFunction(btndel) {
    if (typeof(btndel) == "object") {
        $(btndel).closest('.card').remove();
    } else {
        return false;
    }}
  </script>
@endsection