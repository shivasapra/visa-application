@extends('layouts.frontend')
@section('title')
Sign Contract
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
    	<h3 class="content-header-title"><strong>Sign Contract:</strong> {{$contract->subject}} </h3>
    </div>
    <div class="content-body">
	    <section id="number-tabs">
	              <div class="card">
	                <div class="card-content collapse show">
	                  <div class="card-body">
	                    <form action="{{route('contract.signed',['id'=>$contract->id])}}" class="number-tab-steps wizard-circle" method="post">
	                    	@csrf
	                      <!-- Step 1 -->
	                      
	                      <fieldset>
	                        <div class="row">
	                            <div class="col-md-6">
	                            <div class="form-group">
									<label for="signed_fname">First Name</label>
									<input type="text" name='signed_fname' class="form-control">
								</div>
	                          	</div>
	                          
	                          	<div class="col-md-6">
	                          	<div class="form-group">
	                          		<label for="signed_lname">Last Name</label>
									<input type="text" name='signed_lname' class="form-control">
							  	</div>
							  	</div>
	                        </div>
	                        <div class="row">
		                        <div class="col-md-12">
		                            <div class="form-group">
		                            <label for="signed_email">Email</label>
									<input type="email" name='signed_email' class="form-control">
		                            </div>
		                        </div>
	                        </div>
	                      	<div class="form-group">
							<div class="text-center">
								<button class="btn btn-success" type="submit">Sign</button>
							</div>
							</div>
	                    </form>
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