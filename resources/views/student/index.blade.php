@extends("layouts.frontend")
@section('title')
Students
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
    	<h3 class="content-header-title"><strong>Students</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">Students{{ $students->links() }}
	        </li>
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
                    <thead>
                      <tr>
                        <th>Sno.</th>
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
                      </tr>
                    	</thead>
                    <tbody>
                    	@if($students->count()>0)
                    	<?php $i = 1;?>
							@foreach($students as $student)
		                      <tr>
		                        <th scope="row">{{$i++}}</th>
		                        <td><a href="{{route('student.details',['id'=>$student->id])}}">
									{{$student->first_name}}</a>
								</td>
								<td>{{$student->last_name}}</td>
								<td>{{$student->email}}</td>
								<td>{{$student->gender}}</td>
								<td>{{-- <a href="{{route('student.delete',['id'=>$student->id])}}" class="btn btn-sm btn-danger">Delete</a> --}}
								<a href="{{route('process',['id'=>$student->id])}}" class="btn btn-sm btn-success">Process</a></td>
								
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
						
              <div class="text-center">
					<a href="{{route('students.create')}}" class="btn btn-sm btn-info">Add Student</a>
				</div>
          </div>
		</div>
              	
	</div>


	{{-- <div class="card-header">Students</div>
	<div class="card-body">
		
		<table class="table table-hover">
			<thead>
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
					<tr>
						<td><a href="{{route('student.details',['id'=>$student->id])}}">
							{{$student->first_name}}</a>
						</td>
						<td>{{$student->last_name}}</td>
						<td>{{$student->email}}</td>
						<td>{{$student->gender}}</td>
						<td><a href="{{route('student.delete',['id'=>$student->id])}}" class="btn btn-sm btn-danger">Delete</a>
						<a href="{{route('visa.create',['id'=>$student->id])}}" class="btn btn-sm btn-success">Apply for visa</a></td>
						
					</tr>
					@endforeach
				
				@else
					<tr>
						<th colspan="5" class="text-center">No Students!!</th>
					</tr>
				@endif

			</tbody>
		</table>
	<div class="text-center">
					<a href="{{route('students.create')}}" class="btn btn-sm btn-info">Add Student</a>
				</div>
	</div> --}}
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