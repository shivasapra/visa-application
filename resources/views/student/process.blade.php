@extends('layouts.frontend')
@section('title')
Process
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
    	<h3 class="content-header-title"><strong>Process</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('students')}}">Students</a>
	        </li>
	        <li class="breadcrumb-item">Process</li>
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
	   <form action="{{route('process.update',['id'=>$student->id])}}" method="post">
	   	@csrf
	        <div class="card">
	            <div class="card-content collapse show">
	              <div class="card-body">
	                <div class="row">
	                	<div class="col-md-6">
	                	<div class="form-group">
						<label for="tuition_fee" ><strong>Tuition Fee:</strong></label>
						<input type="text" name='tuition_fee' required class="form-control" value="{{$student->tuition_fee}}">
						</div>
						</div>
					</div>
					<div class="row ">
						<table class="table table-striped">
						<tr>
							<td><strong>Ist installment:</strong></td>
							<td><input type="text" name='st_ins_1' value="{{$student->st_ins_1}}"></td>
							<td><input type="text" name='st_ins_2' value="{{$student->st_ins_2}}">&nbsp;&nbsp;&nbsp;&nbsp;
								@if($student->agent_id != null)
									{{'*'.$student->agent->percentage."%"}}&nbsp;&nbsp;&nbsp;&nbsp; {{"="}}
								@endif
							</td>
							<td><input type="text" name='st_ins_3' value="{{$student->st_ins_3}}"></td>
						</tr>
						<tr>
							<td><strong>IInd installment:</strong></td>
							<td><input type="text" name='nd_ins_1' value="{{$student->nd_ins_1}}"></td>
							<td><input type="text" name='nd_ins_2' value="{{$student->nd_ins_2}}">&nbsp;&nbsp;&nbsp;&nbsp;
								@if($student->agent_id != null)
								{{'*'.$student->agent->percentage."%"}}&nbsp;&nbsp;&nbsp;&nbsp; {{"="}}
								@endif
							</td>
							<td><input type="text" name='nd_ins_3' value="{{$student->nd_ins_3}}"></td>
						</tr>
						<tr>
							<td><strong>IIIrd installment:</strong></td>
							<td><input type="text" name='rd_ins_1' value="{{$student->rd_ins_1}}"></td>
							<td><input type="text" name='rd_ins_2' value="{{$student->rd_ins_2}}">&nbsp;&nbsp;&nbsp;&nbsp;
								@if($student->agent_id != null)
								{{'*'.$student->agent->percentage."%"}}&nbsp;&nbsp;&nbsp;&nbsp; {{"="}}
								@endif
							</td>
							<td><input type="text" name='rd_ins_3' value="{{$student->rd_ins_3}}"></td>
						</tr>
						</table>
					</div>            	
	              </div>
	            </div>
	        </div>
			
			<div class="card">
	            <div class="card-content collapse show">
	              <div class="card-body">
	                <div class="table-responsive">
	             	<table class="table table-hover mb-0">
					<tbody>
						<div class="row">
							<tr>
								<td><strong>LOA:</strong></td>
								<td>
									<input id="yesLOA" type="radio" name="LOA" value="yes"  
									{{($student->LOA == 'yes')?"checked":" "}}>Yes
									<input id="noLOA" type="radio" name="LOA" value="no"
									{{($student->LOA == 'no')?"checked":" "}}>No
									<span id="LOAdate">
										@if($student->LOA == 'yes')
										<input type="date" name="Loa_date" value="{{$student->Loa_date}}" required>
										@endif
									</span>
								</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Processing:</strong></td>
								<td>
									<input type="radio" name="file_processing" value="yes"
									{{($student->file_processing == 'yes')?"checked":" "}}
									{{($student->LOA == 'no')?"disabled":" "}}>Yes
									<input type="radio" name="file_processing" value="no"
									{{($student->file_processing == 'no')?"checked":" "}}>No
								</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Processed:</strong></td>
								<td>
									<input type="radio" name="file_processed" value="yes"
									{{($student->file_processed == 'yes')?"checked":" "}}
									{{($student->file_processing == 'no')?"disabled":" "}}>Yes
									<input type="radio" name="file_processed" value="no"
									{{($student->file_processed == 'no')?"checked":" "}}>No
								</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Submission:</strong></td>
								<td>
									<input id="yessubmission" type="radio" name="file_submission" value="yes"
									{{($student->file_submission == 'yes')?"checked":" "}}
									{{($student->file_processed == 'no')?"disabled":" "}}>Yes
									<input type="radio" id="nosubmission" name="file_submission" value="no"
									{{($student->file_submission == 'no')?"checked":" "}}>No
									<span id="submissiondate">
										@if($student->file_submission == 'yes')
										<input type="date" name="submission_date" value="{{$student->submission_date}}" required>
										@endif
									</span>
								</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Approved:</strong></td>
								<td>
									<input id="yesapproved" type="radio" name="file_approved" value="yes"
									{{($student->file_approved == 'yes')?"checked":" "}}
									{{($student->file_submission == 'no')?"disabled":" "}}>Yes
									<input type="radio" id="noapproved" name="file_approved" value="no"
									{{($student->file_approved == 'no')?"checked":" "}}>No
									<span id="approveddate">
										@if($student->file_approved == 'yes')
										<input type="date" name="approved_date" value="{{$student->approved_date}}" required>
										@endif
									</span>
								</td>
							</tr>
						</div>  
						<div class="row">
							<tr>
								<td><strong>Declined:</strong></td>
								<td>
									<input type="radio" id="yesdeclined" name="file_declined" value="yes"
									{{($student->file_declined == 'yes')?"checked":" "}}
									{{($student->LOA == 'no')?"disabled":" "}}
									{{($student->file_approved == 'yes')?"disabled":" "}}>Yes
									<input type="radio" id="nodeclined" name="file_declined" value="no"
									{{($student->file_declined == 'no')?"checked":" "}}>No
									<span id="declineddate">
										@if($student->file_declined == 'yes')
										<input type="date" name="declined_date" value="{{$student->declined_date}}" required>
										@endif
									</span>
								</td>
							</tr>
						</div>   
					</tbody>
					</table>
					</div>			          	
	              </div>
	            </div>
	        </div>
	        <div class="text-center">
	        	<div class="form-group">
	        		<button class="btn btn-info" type="submit">Update</button>
	        	</div>
	        </div>
		</form>
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
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	    $("#yesLOA").click(function(){
	    	var date = '<input type="date" name="Loa_date" value="{{$student->Loa_date}}" required>';
	        $("#LOAdate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#noLOA").click(function(){
	    	var date = '';
	        $("#LOAdate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#yessubmission").click(function(){
	    	var date = '<input type="date" name="submission_date" value="{{$student->submission_date}}" required>';
	        $("#submissiondate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#nosubmission").click(function(){
	    	var date = '';
	        $("#submissiondate").html(date);   
	        });
	    });$(document).ready(function(){
	    $("#yesapproved").click(function(){
	    	var date = '<input type="date" value="{{$student->approved_date}}" name="approved_date" required>';
	        $("#approveddate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#noapproved").click(function(){
	    	var date = '';
	        $("#approveddate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#yesdeclined").click(function(){
	    	var date = '<input type="date" value="{{$student->declined_date}}" name="declined_date" required>';
	        $("#declineddate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#nodeclined").click(function(){
	    	var date = '';
	        $("#declineddate").html(date);   
	        });
	    });
	</script>
					
	  
@endsection