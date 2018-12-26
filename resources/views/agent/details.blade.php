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
@section('content')
	<div class="content-header text-center">
    <h3 class="content-header-title"><strong>{{$agent->name}}'s</strong> Details:</h3>
    </div>
	<div class="content-body">
		<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
              	<br>
              	<div class="container text-center">
                	<img class="img-responsive menu-thumbnails" src="{{asset($agent->photo)}}" height="150px" width="150px" style="border-radius:20px">
                </div><br>
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
						<td><strong>International College tie up-- 1:</strong></td>
						<td>{{$agent->college1}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>International College tie up-- 2:</strong></td>
						<td>{{$agent->college2}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>ID No.</strong></td>
						<td>{{$agent->id_no}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>License No:</strong></td>
						<td>{{$agent->license_no}}</td>
					</tr>
				</div>
			</tbody>
		</table>
				<br>
				<div class="row">
					<div class="col-md-6">
              	<div class="container text-center">
                	<img class="img-responsive menu-thumbnails" src="{{asset($agent->id_proof)}}" height="150px" width="150px" style="border-radius:20px"><br>
                	<strong>{{"ID"}}</strong>
                </div>
                </div>
                <div class="col-md-6">
              	<div class="container text-center">
                	<img class="img-responsive menu-thumbnails" src="{{asset($agent->license)}}" height="150px" width="150px" style="border-radius:20px"><br>
                	<strong>{{"License"}}</strong>
                </div>
                </div>
                </div>
                <br>
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