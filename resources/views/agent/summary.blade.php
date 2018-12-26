@extends("layouts.frontend")
@section('title')
Agent Summary
@stop
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/vendors.css")}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/app.css")}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/menu/menu-types/vertical-menu.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/colors/palette-callout.css")}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/assets/css/style.css")}}">
  <!-- END Custom CSS-->
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
	<div class="content-header text-center">
    	<h3 class="content-header-title"><strong>{{$agent->name}}'s</strong> Summary:</h3>
    </div>
	
	<div class="content-body">
		<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
		
				<form action="{{route('summary.update',['id'=>$agent->id])}}" class="number-tab-steps wizard-circle" method="post">
	            	@csrf
					<div class="table-responsive">
                 	<table class="table table-hover mb-0">
						<tbody>
							<div class="row">
								<tr>
									<td><strong>Interested:</strong></td>
									<td>
										<input type="radio" name="interested" value="yes" 
										{{($agent->interested == 'yes')?"checked":" "}}>Yes
										<input type="radio" name="interested" value="no"
										{{($agent->interested == 'no')?"checked":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Refused:</strong></td>
									<td>
										<input type="radio" name="refused" value="yes" 
										{{($agent->refused == 'yes')?"checked":" "}}>Yes
										<input type="radio" name="refused" value="no"
										{{($agent->refused == 'no')?"checked":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Proposal Sent:</strong></td>
									<td>
										<input type="radio" name="proposal_sent" value="yes" 
										{{($agent->proposal_sent == 'yes')?"checked":" "}}>Yes
										<input type="radio" name="proposal_sent" value="no"
										{{($agent->proposal_sent == 'no')?"checked":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Document Sent:</strong></td>
									<td>
										<input type="radio" name="document_sent" value="yes" 
										{{($agent->document_sent == 'yes')?"checked":" "}}>Yes
										<input type="radio" name="document_sent" value="no"
										{{($agent->document_sent == 'no')?"checked":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Agreement:</strong></td>
									<td>
										<input type="radio" name="agreement" value="yes" 
										{{($agent->agreement == 'yes')?"checked":" "}}>Yes
										<input type="radio" name="agreement" value="no"
										{{($agent->agreement == 'no')?"checked":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Certification:</strong></td>
									<td>
										<input type="radio" name="certification" value="yes" 
										{{($agent->certification == 'yes')?"checked":" "}}>Yes
										<input type="radio" name="certification" value="no"
										{{($agent->certification == 'no')?"checked":" "}}>No
									</td>
								</tr>
							</div>
						</tbody>
					</table>
					</div>

					<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Save</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	</div>


@stop
@section('js')
	<script src="{{asset("app/front/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset("app/front/app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
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