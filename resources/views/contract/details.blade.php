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
@section('header')
    <div class="content-header row">
    <div class="content-header col-md-6 col-12 mb-1">
      <h3 class="content-header-title"><strong>Contract Details</strong></h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('contracts')}}">Contracts</a>
          </li>
          <li class="breadcrumb-item">Details</li>
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
						<td><strong>Percentage:</strong></td>
						<td>{{$contract->percentage."%"}}</td>
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