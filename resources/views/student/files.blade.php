@extends('layouts.frontend')
@section('title')
File Progress
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
    	<h3 class="content-header-title"><strong>File Progress</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('students')}}">Students</a>
	        </li>
	        <li class="breadcrumb-item">Files</li>
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
	   <form action="{{route('files.update',['id'=>$student->id])}}" method="post">
	   	@csrf
			<div class="card">
	            <div class="card-content collapse show">
	              <div class="card-body">
	                <div class="table-responsive">
	             	<table class="table table-hover mb-0">
					<tbody>
						{{-- <div class="row">
							<tr>
								<td><strong>Processing:</strong></td>
								<td>
									<input type="radio" name="file_processing" value="yes"
									{{($student->file_processing == 'yes')?"checked":" "}}
									{{($student->LOA == 'no')?"disabled":" "}}
									{{($student->file_declined == 'yes')?"readonly":" "}}>Yes
									<input type="radio" name="file_processing" value="no"
									{{($student->file_processing == 'no')?"checked":" "}}
									{{($student->file_processing == 'yes')?"disabled":" "}}>No
								</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Processed:</strong></td>
								<td>
									<input type="radio" name="file_processed" value="yes"
									{{($student->file_declined == 'yes')?"readonly":" "}}
									{{($student->file_processed == 'yes')?"checked":" "}}
									{{($student->file_processing == 'no')?"disabled":" "}}
									>Yes
									<input type="radio" name="file_processed" value="no"
									{{($student->file_processed == 'no')?"checked":" "}}
									{{($student->file_processed == 'yes')?"disabled":" "}}>No
								</td>
							</tr>
						</div> --}}
						<div class="row">
							<tr>
								<td><strong>Submission:</strong></td>
								<td>
									<input id="yessubmission" type="radio" name="file_submission" value="yes"
									{{($student->file_submission == 'yes')?"checked":" "}}
									{{($student->file_declined == 'yes')?"readonly":" "}}>Yes
									<input type="radio" id="nosubmission" name="file_submission" value="no"
									{{($student->file_submission == 'no')?"checked":" "}}
									{{($student->file_submission == 'yes')?"disabled":" "}}>No
									<span id="submissiondate">
										@if($student->file_submission == 'yes')
										<input type="date" name="submission_date" value="{{$student->submission_date}}" required readonly>
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
									{{($student->file_submission == 'no')?"disabled":" "}}
									{{($student->file_declined == 'yes')?"readonly":" "}}>Yes
									<input type="radio" id="noapproved" name="file_approved" value="no"
									{{($student->file_approved == 'no')?"checked":" "}}
									{{($student->file_approved == 'yes')?"disabled":" "}}
									>No
									<span id="approveddate">
										@if($student->file_approved == 'yes')
										<input type="date" name="approved_date" value="{{$student->approved_date}}" required readonly>
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
									{{($student->file_declined == 'no')?"checked":" "}}{{($student->file_declined == 'yes')?"disabled":" "}}>No
									<span id="declineddate">
										@if($student->file_declined == 'yes' and $student->refund == 'no')
										<input type="date" name="declined_date" value="{{$student->declined_date}}" required readonly>&nbsp;
										<a href="{{route('reapply',['id'=>$student->id])}}" class="btn btn-sm btn-success">Re-Apply</a>
										@endif
									</span>
								</td>
							</tr>
							@if($student->file_declined == 'yes')
								<tr>
									<td><strong>Refund:</strong></td>
								<td>
									<input id="yesrefund" type="radio" name="refund" value="yes"
									{{($student->refund == 'yes')?"checked":" "}}>Yes
									<input type="radio" id="norefund" name="refund" value="no"
									{{($student->refund == 'no')?"checked":" "}}
									{{($student->refund == 'yes')?"disabled":" "}}
									>No
									<span id="refunddate">
										@if($student->refund == 'yes')
										<input type="date" name="refund_date" value="{{$student->refund_date}}" required readonly>
										@endif
									</span>
								</td>	
								</tr>
							@endif
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
	    $("#yessubmission").click(function(){
	    	var date = '<input type="date" name="submission_date" value="{{$student->submission_date}}" required {{($student->file_submission == 'yes')?"readonly":" "}}>';
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
	    	var date = '<input type="date" value="{{$student->approved_date}}" name="approved_date" required {{($student->file_approved == 'yes')?"readonly":" "}}>';
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
	    	var date = '<input type="date" value="{{$student->declined_date}}" name="declined_date" required {{($student->declined == 'yes')?"readonly":" "}}> &nbsp;';
	        $("#declineddate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#nodeclined").click(function(){
	    	var date = '';
	        $("#declineddate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#yesrefund").click(function(){
	    	var date = '<input type="date" value="{{$student->refund_date}}" name="refund_date" required {{($student->refund == 'yes')?"readonly":" "}}> &nbsp;';
	        $("#refunddate").html(date);   
	        });
	    });
	    $(document).ready(function(){
	    $("#norefund").click(function(){
	    	var date = '';
	        $("#refunddate").html(date);   
	        });
	    });
	   //  $(document).ready(function(){
    // 		$("target1").hover(function(){
	   //  	var cal =  document.getElementsById("#st_ins_2").value * 
	   //  	var final = cal/100;
	   //  	document.getElementsById("#st_ins_3").value = final;
    // });
    // });
    @if($student->agent_id != null)
	   $(document).ready(function(){
    	$("#target").hover(function(){
    		document.getElementsByName("st_ins_3")[0].value =(document.getElementsByName("st_ins_2")[0].value * {{$student->agent->percentage}})/100;
    	});
    	});
	   $(document).ready(function(){
    	$("#target").hover(function(){
    		document.getElementsByName("nd_ins_3")[0].value =(document.getElementsByName("nd_ins_2")[0].value * {{$student->agent->percentage}})/100;
    	});
    	});
	    $(document).ready(function(){
    	$("#target").hover(function(){
    		document.getElementsByName("rd_ins_3")[0].value =(document.getElementsByName("rd_ins_2")[0].value * {{$student->agent->percentage}})/100;
    	});
    	});
    	@endif
	</script>
					
	  
@endsection