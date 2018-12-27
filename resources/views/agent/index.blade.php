@extends('layouts.frontend')
@section('title')
Agents
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
    	<h3 class="content-header-title"><strong>Agents</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">Agents
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
						<th>Sno.</th>
						<th>
							Name
						</th>
						<th>
							Company
						</th>
						<th>
							City
						</th>
						<th>
							Phone
						</th>
						<th>
							Email
						</th>
						<th>
							Status
						</th>
						<th>
							id proof
						</th>
						<th>
							license
						</th>
						
					</thead>
					<tbody>
						@if($agents->count()>0)
						<?php $i = 1;?>
							@foreach($agents as $agent)
							<tr>
								<th scope="row">{{$i++}}</th>
								<td><a href={{route('agent.business',['id'=>$agent->id])}}>{{$agent->name}}</a></td>
								<td>{{$agent->company}}</td>
								<td>
									{{$agent->location}}
								</td>
								<td>
									{{$agent->mobile}}
								</td>
								<td>{{$agent->email}}</td>
								<td>
									@if($agent->interested == 'yes')
										<div class="success">{{"Interested"}}</div>
									@else
										<div class="warning">{{"Not Interested"}}</div>
									@endif
								</td>
								<td>
									{{$agent->id_no}}
								</td>
								<td>
									{{$agent->license_no}}
								</td>
							
							</tr>
							@endforeach
						@else
							<tr>
								<th colspan="5" class="text-center">No Agents!!</th>
							</tr>
						@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>
		<div class="text-center">
		<a href="{{route('agent.create')}}" class="btn btn-sm btn-info">Add Agent</a>
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