@extends("layouts.frontend")
@section('title')
Lead Details
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
    	<h3 class="content-header-title"><strong>{{$lead->student_fname}}'s </strong>Details:</h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('leads')}}">leads</a>
	        </li>
	        <li class="breadcrumb-item">lead's details</li>
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
								<td><strong>Source:</strong></td>
								@if($lead->agent_id)
								<td>{{$lead->agent->name}}</td>
								@elseif($lead->social_id)
								<td>{{$lead->social->social}}</td>
								@elseif($lead->third_party)
								<td>{{$lead->third_party}}</td>
								@endif
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>First Name:</strong></td>
								<td>{{$lead->student_fname}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Last Name:</strong></td>
								<td>{{$lead->student_lname}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Email:</strong></td>
								<td>{{$lead->email}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Mobile:</strong></td>
								<td>{{$lead->Mobile}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Address:</strong></td>
								<td>{{$lead->address}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>State/UT:</strong></td>
								<td>{{$lead->state}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>District:</strong></td>
								<td>{{$lead->district}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>City:</strong></td>
								<td>{{$lead->city}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Postal Code:</strong></td>
								<td>{{$lead->postal_code}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Description:</strong></td>
								<td>{{$lead->description}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Status:</strong></td>
								<td>{{$lead->interested}} ({{$lead->StatuS_info}})</td>
							</tr>
						</div>
					</tbody>
				</table>
				</div>
			</div>
		</div>
		<div class="text-center">
			@if($lead->status != 2)
			<a href="{{route('lead.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
			@else
			<span class="text-primary">{{'(Converted)'}}</span>
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
@stop