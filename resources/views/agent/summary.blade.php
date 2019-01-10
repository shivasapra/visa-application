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
@section('header')
    <div class="content-header row">
    <div class="content-header col-md-6 col-12 mb-1">
      <h3 class="content-header-title"><strong>{{$agent->company}}'s</strong> Summary:</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agents')}}">Agents</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agent.business',['id'=>$agent->id])}}">Agent Buisness</a></li>
          <li class="breadcrumb-item">Agent Summary</li>
        </ol>
      </div>
    </div>
  </div>
@stop
@section('content')
	
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
										{{($agent->interested == 'no')?"checked":" "}}
										{{($agent->interested == 'yes')?"disabled":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Proposal sent:</strong></td>
									<td>
										<input type="radio" name="proposal_sent" value="yes"
										{{($agent->proposal_sent == 'yes')?"checked":" "}}
										{{($agent->interested == 'no')?"disabled":" "}}>Yes
										<input type="radio" name="proposal_sent" value="no"
										{{($agent->proposal_sent == 'no')?"checked":" "}}
										{{($agent->proposal_sent == 'yes')?"disabled":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Document received:</strong></td>
									<td>
										<input type="radio" name="document_received" value="yes" 
										{{($agent->document_received == 'yes')?"checked":" "}}
										{{($agent->proposal_sent == 'no')?"disabled":" "}}>Yes
										<input type="radio" name="document_received" value="no"
										{{($agent->document_received == 'no')?"checked":" "}}{{($agent->document_received == 'yes')?"disabled":" "}}>No
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Agreement sent to Agent:</strong></td>
									<td>
										<input type="radio" name="agreement_sent" value="yes" 
										{{($agent->agreement_sent == 'yes')?"checked":" "}}
										{{($agent->document_received == 'no')?"disabled":" "}}>Yes
										<input type="radio" name="agreement_sent" value="no"
										{{($agent->agreement_sent == 'no')?"checked":" "}}
										{{($agent->agreement_sent == 'yes')?"disabled":" "}}>No
										<input type="date" name="agreement_sent_date" required 
										value="{{$agent->agreement_sent_date}}"
										{{($agent->document_received == 'no')?"disabled":" "}}>
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Agreement signed by Agent:</strong></td>
									<td>
										<input type="radio" name="agreement_signed_agent" value="yes" 
										{{($agent->agreement_signed_agent == 'yes')?"checked":" "}}
										{{($agent->agreement_sent == 'no')?"disabled":" "}}>Yes
										<input type="radio" name="agreement_signed_agent" value="no"
										{{($agent->agreement_signed_agent == 'no')?"checked":" "}}{{($agent->agreement_signed_agent == 'yes')?"disabled":" "}}>No
									<input type="date" name="agreement_signed_agent_date" required
										value="{{$agent->agreement_signed_agent_date}}" required 
										{{($agent->agreement_sent == 'no')?"disabled":" "}}>
										<a href="{{route('contract.store',['id'=>$agent->id])}}" class="btn btn-sm btn-success {{($agent->agreement_sent == 'no')?"disabled":" "}}" >Click to create contract</a>
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Agreement signed by college:</strong></td>
									<td>
										<input type="radio" name="agreement_signed_college" value="yes" 
										{{($agent->agreement_signed_college == 'yes')?"checked":" "}}
										{{($agent->agreement_signed_agent == 'no')?"disabled":" "}}>Yes
										<input type="radio" name="agreement_signed_college" value="no"
										{{($agent->agreement_signed_college == 'no')?"checked":" "}}{{($agent->agreement_signed_college == 'yes')?"disabled":" "}}>No
										<input type="date" name="agreement_signed_college_date"
										value="{{$agent->agreement_signed_college_date}}" required
										{{($agent->agreement_signed_agent == 'no')?"disabled":" "}}>
									</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>certificate issued:</strong></td>
									<td>
										<input type="radio" name="certificate_issued" value="yes" 
										{{($agent->certificate_issued == 'yes')?"checked":" "}}
										{{($agent->agreement_signed_college == 'no')?"disabled":" "}}>Yes
										<input type="radio" name="certificate_issued" value="no"
										{{($agent->certificate_issued == 'no')?"checked":" "}}{{($agent->certificate_issued == 'yes')?"disabled":" "}}>No
										<input type="date" name="certificate_issued_date" required
										value="{{$agent->certificate_issued_date}}"
										{{($agent->agreement_signed_college == 'no')?"disabled":" "}}>
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