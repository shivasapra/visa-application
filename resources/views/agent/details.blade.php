@extends("layouts.frontend")
@section('title')
Agent Details
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
      <h3 class="content-header-title"><strong>{{$agent->name}}'s</strong> Details:</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agents')}}">Agents</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agent.business',['id'=>$agent->id])}}">Agent Buisness</a></li>
          <li class="breadcrumb-item">Agent Details</li>
        </ol>
      </div>
    </div>
  </div>
@stop
@section('content')
	<div class="content-body">
		<div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-content collapse show">
              	{{-- <br> --}}
              	{{-- <div class="container text-center">
                	<img class="img-responsive menu-thumbnails" src="{{asset($agent->photo)}}" height="150px" width="150px" style="border-radius:20px">
                </div><br> --}}
                <div class="table-responsive">
			        <table class="table table-hover mb-0">
						<tbody>
							<div class="row">
								<tr>
									<td><strong>Name:</strong></td>
									<td>{{$agent->name}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Designation:</strong></td>
									<td>{{$agent->designation}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Company:</strong></td>
									<td>{{$agent->company}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Email:</strong></td>
									<td>{{$agent->email}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Address:</strong></td>
									<td>{{$agent->address}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>State/UT:</strong></td>
									<td>{{$agent->state}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>District:</strong></td>
									<td>{{$agent->district}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>City:</strong></td>
									<td>{{$agent->location}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Postal Code:</strong></td>
									<td>{{$agent->postal_code}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Mobile:</strong></td>
									<td>{{$agent->mobile}}</td>
								</tr>
							</div>
							<div class="row">
								<tr>
									<td><strong>Website:</strong></td>
									<td>{{$agent->website}}</td>
								</tr>
							</div>
							
							<div class="row">
								<tr>
									<td><strong>Photos Received:</strong></td>
									<td>{{$agent->photos_received}}</td>
								</tr>
							</div>
							</tbody>
					</table>
				</div>
			</div>
			</div>
			<div class="text-center">
    <a href="{{route('edit.agent',['id'=>$agent->id])}}" class="btn btn-info">Edit Profile</a>
    </div>
			</div>
          <div class="col-4">
            <div class="card">
              <div class="card-content collapse show">
				<div class="table-responsive">
			    <table class="table table-hover mb-0">
			    	<thead>
			    		<th>{{"Id Name:"}}</th>
			    		<th>{{"Id No:"}}</th>
			    	</thead>
			    <tbody>
            	<div class="text-center"><h4>{{"Identity"}}</h4></div>
				@foreach($identity as $identit)
				
					<tr>
						<td><strong>{{$identit->id_name}}</strong></td>
						<td>{{$identit->id_no}}</td>
					</tr>
				
				@endforeach
				</tbody>
				</table>
				</div>
			</div>
			</div>
				<div class="card">
              <div class="card-content collapse show">
				<div class="table-responsive">
			    <table class="table table-hover mb-0">
			    <tbody>
				@if($agent->reference1_name)
            	<div class="text-center"><h4>{{"Reference1"}}</h4></div>
					<tr>
						<td><strong>Name:</strong></td>
						<td>{{$agent->reference1_name}}</td>
					</tr>
				@endif
				@if($agent->reference1_mobile)
					<tr>
						<td><strong>Mobile:</strong></td>
						<td>{{$agent->reference1_mobile}}</td>
					</tr>
				@endif
				@if($agent->reference1_email)
					<tr>
						<td><strong>Email:</strong></td>
						<td>{{$agent->reference1_email}}</td>
					</tr>
				@endif
				@if($agent->reference1_contact)
					<tr>
						<td><strong>Contact Person:</strong></td>
						<td>{{$agent->reference1_contact}}</td>
					</tr>
				@endif
				@if($agent->reference1_website)
					<tr>
						<td><strong>Website:</strong></td>
						<td>{{$agent->reference1_website}}</td>
					</tr>
				@endif
				</tbody>
				</table>
				</div>
			</div>
			</div>
			<div class="card">
              <div class="card-content collapse show">
				<div class="table-responsive">
			    <table class="table table-hover mb-0">
			    <tbody>
				@if($agent->reference2_name)
            	<div class="text-center"><h4>{{"Reference2"}}</h4></div>
					<tr>
						<td><strong>Name:</strong></td>
						<td>{{$agent->reference2_name}}</td>
					</tr>
				@endif
				@if($agent->reference2_mobile)
					<tr>
						<td><strong>Mobile:</strong></td>
						<td>{{$agent->reference2_mobile}}</td>
					</tr>
				@endif
				@if($agent->reference2_email)
					<tr>
						<td><strong>Email:</strong></td>
						<td>{{$agent->reference2_email}}</td>
					</tr>
				@endif
				@if($agent->reference2_contact)
					<tr>
						<td><strong>Contact Person:</strong></td>
						<td>{{$agent->reference2_contact}}</td>
					</tr>
				@endif
				@if($agent->reference2_website)
					<tr>
						<td><strong>Website:</strong></td>
						<td>{{$agent->reference2_website}}</td>
					</tr>
				@endif
				</tbody>
				</table>
				</div>
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
@endsection