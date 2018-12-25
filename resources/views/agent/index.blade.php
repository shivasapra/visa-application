@extends('layouts.frontend')
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
    	<h3 class="content-header-title"><strong>Agents</strong></h3>
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
							Name
						</th>
						<th>
							Email
						</th>
						<th>
							id proof
						</th>
						<th>
							license
						</th>
						<th>
							photo
						</th>
					</thead>
					<tbody>
						@if($agents->count()>0)
							@foreach($agents as $agent)
							<tr>
								<th scope="row">{{$agent->id}}</th>
								<td><a href={{route('agent.business',['id'=>$agent->id])}}>{{$agent->name}}</a></td>
								<td>{{$agent->email}}</td>
								<td>
									<img class="img-responsive menu-thumbnails" src="{{asset($agent->id_proof)}}"  width="30px" height="30px"/>
								</td>
								<td>
									<img class="img-responsive menu-thumbnails" src="{{asset($agent->license)}}"  width=30px" height="30px"/>
								</td>
								<td>
									<img class="img-responsive menu-thumbnails" src="{{asset($agent->photo)}}"  width="30px" height="30px"/>
								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<th colspan="5" class="text-center">No Agents</th>
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