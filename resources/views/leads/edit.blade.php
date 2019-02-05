@extends('layouts.frontend')
@section('title')
Create Lead

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
	                    <form action="{{route('lead.update',['id'=>$lead->id])}}" class="number-tab-steps wizard-circle" method="post">
	                    	@csrf
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
	                              <label for="student_fname">First Name :</label>
	                              <input type="text" class="form-control" name="student_fname" required value="{{$lead->student_fname}}">
	                            </div>
	                          </div>
	                          <div class="col-md-6">
	                            <div class="form-group">
	                              <label for="student_lname">Last Name :</label>
	                              <input type="text" class="form-control" name="student_lname" required value="{{$lead->student_lname}}">
	                            </div>
	                          </div>
	                          </div>
	                          <div class="row">
		                          <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="email">Email Address :</label>
		                              <input type="email" class="form-control" name="email" value="{{$lead->email}}">
		                            </div>
		                           </div>
		                           <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="mobile">Mobile :</label>
		                              <input type="text" maxlength="10" minlength="10" class="form-control" name="Mobile" required value="{{$lead->Mobile}}">
		                            </div>
		                           </div>
	                          </div>
	                        	           
	                      </fieldset>
	                      <!-- Step 2 -->
	                      
	                      <fieldset>
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
								 <input type="text" pattern="\d*" name='postal_code' required  class="form-control" value="{{$lead->postal_code}}" maxlength="7">
	                            </div>
	                        	</div>
	                        </div>
	                        <div class="row">
	                        	<div class="col-md-8">
	                            <div class="form-group">
	                              <label for="description">Short Description :</label>
	                              <textarea name="description" id="description" rows="4" class="form-control">{{$lead->description}}</textarea>
	                            </div>
	                          </div>
	                        	<div class="col-md-4">
	                            <div class="form-group">
	                            	<label for="StatuS">Status:</label><hr>
	                              <input type="radio" value="interested" name="StatuS" required {{($lead->interested == 'interested')?"checked":""}}>Interested<br>
	                              <input type="radio" id="not-button" value="Not-Interested" name="StatuS" {{($lead->interested == 'Not-Interested')?"checked":""}}>Not Interested<span id="not-interested" required>
	                              	@if($lead->not_interested_info != null)
	                              	<input type="text" class="form-control" name="not_interested_info" required value="{{$lead->not_interested_info}}">
	                              	@endif
	                              </span><br>
	                              <input type="radio" id="follow-button" value="Follow-up" name="StatuS" required {{($lead->interested == 'Follow-up')?"checked":""}}>Follow-Up <span id="follow-up">
	                              	@if($lead->follow_up_info != null)
	                              	<input type="text" class="form-control" name="follow_up_info" required value="{{$lead->follow_up_info}}">
	                              	@endif
	                              </span>	
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


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
	    $('#not-button').click(function(){
	    	var textbox = '<input type="text" class="form-control" name="not_interested_info" required value="{{$lead->not_interested_info}}">';
	    	$('#follow-up').html('');
	    	$('#not-interested').html(textbox);
	    });
	});

		$(document).ready(function(){
	    $('#follow-button').click(function(){
	    	var textbox = '<input type="text" class="form-control" name="follow_up_info" required value="{{$lead->follow_up_info}}">';
	    	$('#not-interested').html('');
	    	$('#follow-up').html(textbox);
	    });
	});
	</script>
@endsection