@extends('layouts.frontend')
@section('title')
Create Lead
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
    	<h3 class="content-header-title">Create New lead</h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('leads')}}">leads</a>
	        </li>
	        <li class="breadcrumb-item">Create lead</li>
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
	                    <form action="{{route('lead.store')}}" class="number-tab-steps wizard-circle" method="post">
	                    	@csrf
	                      <!-- Step 1 -->
	                      
	                      <fieldset>
	                        <div class="row">
	                          <div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="source">Source</label>
	                              <select class="custom-select form-control" id="first"
	                              name="source" required>
	                              <option value=""></option>
									<option value="social">{{'Social'}}</option>
									<option value="agent">{{'Agent'}}</option>
									<option value="third_party">{{'Other'}}</option>
	                              </select>
	                            </div>
	                        </div>
	                        <div class="col-md-6" >
	                          	<div class="form-group" id="third">
	                            </div>
	                        </div>
	                    	</div>
	                        <div class="row">
	                            <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="student_fname">First Name :</label>
	                              <input type="text" class="form-control" name="student_fname" required>
	                            </div>
	                          </div>
	                          <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="student_lname">Last Name :</label>
	                              <input type="text" class="form-control" name="student_lname" required>
	                            </div>
	                          </div>
	                          </div>
	                          <div class="row">
		                          <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="email">Email Address :</label>
		                              <input type="email" class="form-control" name="email">
		                            </div>
		                           </div>
		                           <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="mobile">Mobile :</label>
		                              <input type="text" maxlength="10" minlength="10" class="form-control" name="Mobile" required>
		                            </div>
		                           </div>
	                          </div>
	                        	           
	                      </fieldset>
	                      <!-- Step 2 -->
	                      
	                      <fieldset>
	                        <div class="row">
	                          <div class="col-md-6">
	                            <label for="address" >address</label>
								<input type="text"  name='address' required class="form-control">
	                            </div>
	                            <div class="col-md-6">
	                            <label for="state" >State/UT</label>
								<input type="text"  name='state' required class="form-control">
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-md-6">
	                            <div class="form-group">
	                             <label for="district">District</label>
								 <input type="text" name='district' required  class="form-control">
	                            </div>
	                        	</div>
	                        	<div class="col-md-3">
	                            <div class="form-group">
	                             <label for="city">City</label>
								 <input type="text" name='city' required  class="form-control">
	                            </div>
	                        	</div>
	                            <div class="col-md-3">
	                            <div class="form-group">
	                             <label for="postal_code">Postal code</label>
								 <input type="text" pattern="\d*" name='postal_code' required  class="form-control" maxlength="7">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-md-8">
	                            <div class="form-group">
	                              <label for="description">Short Description :</label>
	                              <textarea name="description" id="description" rows="4" class="form-control"></textarea>
	                            </div>
	                          </div>
	                        	<div class="col-md-4">
	                            <div class="form-group">
	                            	<label for="StatuS">Status:</label><hr>
	                              <input type="radio" value="interested" name="StatuS" required>Interested<br>
	                              <input type="radio" id="not-button" value="Not-Interested" name="StatuS" >Not Interested<span id="not-interested" required></span><br>
	                              <input type="radio" id="follow-button" value="Follow-up" name="StatuS" required >Follow-Up <span id="follow-up"></span>	
	                            </div>
	                          </div>
	                        </div>
	                      </fieldset>
	                      <div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add lead</button>
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



	{{-- <div class="card-header">Create a new lead</div>
		<div class="card-body">
			<form action="{{route('lead.store')}}" method='post'>
				{{csrf_field()}}
				<div class="form-group">
				<label for="agent_id">Select Agent</label><br>
				<select name="agent_id" class="form-control">
					@foreach( $agents as $agent)
					 <option value="{{$agent->id}}">{{$agent->name}}</option>
					@endforeach
				</select>
				</div>
				<div class="form-group">
					<label for="student_fname">First name</label>
					<input type="text" name='student_fname' class="form-control">
				</div>
				<div class="form-group">
					<label for="student_lname">Last name</label>
					<input type="text" name='student_lname' class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name='email' class="form-control">
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
					<label for="description">Description</label>
					<textarea name="description" cols="5" rows="5" class="form-control"></textarea>
					
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add lead</button>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	    $('#first').on('change', function(){
	    	var source = this.value;
	    	if (source == 'agent')
		    	{
		    		var options = "";
			    	@foreach($agents as $agent)
			    	@if($agent->percentage != "null")
			    		options = options + "<option value='{{$agent->id}}'>{{$agent->name}}</option>";
			    	@endif
			    	@endforeach
		    		var select = '<label for="idd">Select Agent</label><select class="custom-select form-control" name="idd" required >'+options+'</select>'
        		$("#third").html(select);
		    }
	    	if(source == 'social')
		    	{
		    		var options = "";
		    	@foreach($socials as $social)
		    		options = options + "<option value='{{$social->id}}'>{{$social->social}}</option>";
		    	@endforeach
		    	var select = '<label for="idd">Select Social</label><select class="custom-select form-control" name="idd" required >'+options+'</select>'
		    	$("#third").html(select);
		    }
	        if (source == 'third_party')
	        	{
	        		var input = '<label for="third_party">Enter name</label><input type="text" name="third_party" required  class="form-control">';
	        		$("#third").html(input);
	        	}
		    });
		});

		$(document).ready(function(){
	    $('#not-button').click(function(){
	    	var textbox = '<input type="text" class="form-control" name="StatuS_info" required>';
	    	$('#not-interested').html(textbox);
	    });
	});

		$(document).ready(function(){
	    $('#follow-button').click(function(){
	    	var textbox = '<input type="text" class="form-control" name="StatuS_info" required>';
	    	$('#follow-up').html(textbox);
	    });
	});
		
	</script>
@endsection