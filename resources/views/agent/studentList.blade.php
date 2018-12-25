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
    	<h3 class="content-header-title"><strong>Students under "{{$agent->name}}"</strong></h3>
    </div>
	<div class="content-body">
		<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
				<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<th>#</th>
						<th>
							First Name
						</th>
						<th>
							Last Name
						</th>
						<th>
							Email
						</th>
						<th>
							Gender
						</th>
						
					</thead>
					<tbody>
						@if($students->count()>0)
							@foreach($students as $student)
							<tr><th scope="row">{{$student->id}}</th>
								<td><a href="{{route('student.details',['id'=>$student->id])}}">
									{{$student->first_name}}</a>
								</td>
								<td>{{$student->last_name}}</td>
								<td>{{$student->email}}</td>
								<td>{{$student->gender}}</td>
							</tr>
							@endforeach
						
						@else
							<tr>
								<th colspan="5" class="text-center">No Students!!</th>
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