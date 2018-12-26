@extends('layouts.frontend')
@section('title')
New Contract
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
      <h3 class="content-header-title"><strong>Edit Contract</strong></h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('contracts')}}">Contracts</a>
          </li>
          <li class="breadcrumb-item">Edit Contract</li>
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
	                    <form action="{{route('update.contract',['id'=>$contract->id])}}" class="number-tab-steps wizard-circle" method="post">
	                    	@csrf
	                      <!-- Step 1 -->
	                      
	                      <fieldset>
	                      	<div class="row">
	                            <div class="col-md-12">
	                            	<div class="form-group">
									<label for="agent_id">Select agent</label><br>
									<select name="agent_id" class="form-control" >
										<option value="{{$contract->agent->id}}">{{$contract->agent->name}}</option>
									</select>
								</div>
	                            </div>
	                        </div>
	                        <div class="row">
	                          	<div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="percentage">Percentage</label><br>
									<input type="radio" name='percentage' value="10" {{($contract->percentage == 10)?"checked":" "}}>10 % <br>
									<input type="radio" name='percentage' value="15" {{($contract->percentage == 15)?"checked":" "}}>15 % <br>
									<input type="radio" name='percentage' value="20" {{($contract->percentage == 20)?"checked":" "}}>20 %
									<br>
									<input type="radio" name='percentage' {{($contract->percentage != 10 and $contract->percentage != 15 and $contract->percentage != 20)?"checked":" "}}>Other:<input type="text" name='percentage_' 
										@if($contract->percentage != 10 and $contract->percentage != 15 and $contract->percentage != 20)
											value="{{$contract->percentage}}" 
										@endif
										class="form-control">
							  	</div>
							  	</div>
	                            <div class="col-md-6">
	                            	<div class="form-group">
									<label for="description">Description</label><br>
									<textarea value="{{$contract->description}}" name="description" id="description" rows="6"  class="form-control"></textarea>
								</div>
	                            </div>
	                        </div>
	                        <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                            <label for="start_date">Start Date</label>
		                            <input type="date" name="start_date" class="form-control" placeholder="dd/mm/yyyy" value="{{$contract->start_date}}">
		                        </div>
		                    </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                              <label for="end_date">End Date</label><br>
									  <input type="date" name='end_date' class="form-control" placeholder="dd/mm/yyyy" value="{{$contract->end_date}}">
		                            </div>
		                        </div>
	                        </div>
	                        
	                            
	                      </fieldset>
	                      	<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Update Contract</button>
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