@extends("layouts.frontend")
@section('title')
Contract Details
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
@endsection
@section('content')
	<div class="content-header text-center">
    <h3 class="content-header-title"><strong>{{$contract->subject}}:</strong></h3>
    </div>
	<div class="content-body">
		<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="table-responsive">
                 <table class="table table-hover mb-0">
			<tbody>
				<div class="row">
					<tr>
						<td><strong>Agent:</strong></td>
						<td>{{$contract->agent->name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Subject:</strong></td>
						<td>{{$contract->subject}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Contract Value:</strong></td>
						<td>{{"$".$contract->contract_value}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Start Date:</strong></td>
						<td>{{$contract->start_date}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>End Date:</strong></td>
						<td>{{$contract->end_date}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Description:</strong></td>
						<td>{{$contract->description}}</td>
					</tr>
				</div>
			</tbody>
		</table>
	</div>
	</div>
	</div>
	  <div class="text-center">
	  	@if($contract->signed == 'yes')
          <h4><strong>Signed by:</strong> {{$contract->signed_fname}} {{$contract->signed_lname}}({{$contract->signed_email}})</h4>
        @else
      		<a href="{{route('contract.sign',['id'=>$contract->id])}}" class="btn btn-sm btn-success">Sign Contract</a>
      	@endif
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
@endsection