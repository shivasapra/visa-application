@extends("layouts.frontend")
@section('title')
Edit Lead Status
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
    	<h3 class="content-header-title">Lead->{{$lead->student_fname}}</h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('leads')}}">leads</a>
	        </li>
	        <li class="breadcrumb-item">Edit</li>
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
							status
						</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<tr>
                    	<th scope="row">{{$lead->id}}</th>
						<td>{{$lead->student_fname}}</td>
						<td>{{$lead->student_lname}}</td>
						<td>{{$lead->email}}</td>
						<td>
							<form action="{{route('status.save',['id'=>$lead->id])}}" method="post">
									{{csrf_field()}}
									<div class="row">
							<div class="col-sm-6">
								<select name="status" class="form-control">
								 <option value="0">Not processed</option>
								 <option value="1">Processing</option>
								</select>
							</div>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-success" value="save">
							</div></div>
							</form>
						</td>
					</tr>
                    </tbody>
                </table>
                </div>
              </div>
            </div>
          </div>
		</div>
	</div>
	


	{{-- <div class="card-header text-center"><strong>Lead->{{$lead->student_fname}}</strong></div>
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
				
					<tr>
						<td>
							{{$lead->student_fname}}
						</td>
						<td>{{$lead->student_lname}}</td>
						<td>{{$lead->email}}</td>
						
						<td>
							
								<form action="{{route('status.save',['id'=>$lead->id])}}" method="post">
										{{csrf_field()}}
										<div class="row">
								<div class="col-sm-6">
									<select name="status" class="form-control">
									 <option value="0">Not processed</option>
									 <option value="1">Processing</option>
									</select>
								</div>
								<div class="col-sm-6">
									<input type="submit" class="btn-sm btn-success" value="save">
								</div></div>
								</form>
							
						</td>
					
					</tr>
					
			</tbody>
		</table>
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