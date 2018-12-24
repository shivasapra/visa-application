@extends("layouts.frontend")
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
    <h3 class="content-header-title"><strong>{{$student->first_name}}'s</strong> Details:</h3>
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
						<td>{{$student->agent->name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>First Name:</strong></td>
						<td>{{$student->first_name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Last Name:</strong></td>
						<td>{{$student->last_name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Email:</strong></td>
						<td>{{$student->email}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Title:</strong></td>
						<td>{{$student->title}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Gender:</strong></td>
						<td>{{$student->gender}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>First Language:</strong></td>
						<td>{{$student->first_language}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>DOB:</strong></td>
						<td>{{$student->DOB}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Mobile:</strong></td>
						<td>{{$student->Mobile}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Address:</strong></td>
						<td>{{$student->address}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Postal Code:</strong></td>
						<td>{{$student->postal_code}}</td>
					</tr>
				</div>
			</tbody>
		</table>
	</div>
	</div>
	</div>
		<div class="text-center">
			<a href="{{route('visa.details',['id'=>$student->id])}}" class="btn btn-sm btn-info">Visa Details</a>
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