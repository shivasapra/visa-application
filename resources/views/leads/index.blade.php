@extends("layouts.frontend")
@section('title')
Leads
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
    	<h3 class="content-header-title"><strong>leads</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">leads
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
							status
						</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@if($leads->count()>0)
                    	<?php $i = 1;?>
							@foreach($leads as $lead)
		                      <tr>
		                        <th scope="row">{{$i++}}</th>
		                        <td>{{$lead->student_fname}}</td>
								<td>{{$lead->student_lname}}</td>
								<td>{{$lead->email}}</td>
								<td>
									<span class="text-info">{{$lead->interested}}&nbsp;</span>
									@if($lead->status == 0)
										Not processed
										<a href="{{route('status.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
									@elseif($lead->status == 1)
										Processing
											<a href="{{route('student.add',['id'=>$lead->id])}}" class="btn btn-sm btn-success">Add student</a>
											<a href="{{route('status.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
									@else
										<a href="{{route('details.lead',['id'=>$lead->id])}}">Processed</a>
									@endif
								</td>
								<td>
									<a href="{{route('lead.show',['id'=>$lead->id])}}" class="btn btn-sm btn-info">View</a>
								</td>
		                      </tr>
		                	@endforeach
						@else
							<tr>
								<th colspan="5" class="text-center">No leads!!</th>
							</tr>
						@endif
                    </tbody>
                </table>
                </div>
              </div>
            </div>
            <div class="text-center">
				<a href="{{route('lead.create')}}" class="btn btn-sm btn-info">Add lead</a>
			</div>
          </div>
		</div>
	</div>
{{-- 	<div class="card-header text-center"><strong>Leads</strong></div>
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
					status
				</th>
				
			</thead>
			<tbody>

				@if($leads->count()>0)
					@foreach($leads as $lead)
					<tr>
						<td>
							{{$lead->student_fname}}
						</td>
						<td>{{$lead->student_lname}}</td>
						<td>{{$lead->email}}</td>
						<td>
							@if($lead->status == 0)
								Not processed
								<a href="{{route('status.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
							@elseif($lead->status == 1)
								Processing
									<a href="{{route('student.add',['id'=>$lead->id])}}" class="btn btn-sm btn-success">Add student</a>
									<a href="{{route('status.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
							@else
								<a href="{{route('details.lead',['id'=>$lead->id])}}">Processed</a>
							@endif
							
						</td>

						
					</tr>
					@endforeach
				
				@else
					<tr>
						<th colspan="5" class="text-center">No leads!!</th>
					</tr>
				@endif

			</tbody>
		</table>
	<div class="text-center">
					<a href="{{route('lead.create')}}" class="btn btn-sm btn-info">Add lead</a>
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