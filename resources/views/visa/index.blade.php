@extends("layouts.frontend")
@section('title')
Visa
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
    	<h3 class="content-header-title"><strong>Visa Status</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">Visa Status
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
				<div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Total Approved</h5>
                        <h3 class="font-large-2 text-bold-200">{{$total_approved}}
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="81" class="knob hide-value responsive angle-offset" data-angleOffset="20"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FFA87D" data-knob-icon="icon-energy">
                      </div>
                     </div>
                   </div>

                  <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Total Rejected</h5>
                        <h3 class="font-large-2 text-bold-200">{{$total_rejected}}
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleOffset="0"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FF7588" data-knob-icon="icon-pointer">
                      </div>
                    </div>
                  </div>

					<div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    
                      <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="primary">Total Reapplied</h5>
                        <h3 class="font-large-2 text-bold-200">{{$total_re_applied}}</h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleOffset="40"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#00B5B8" data-knob-icon="icon-trophy">
                      </div>
                    </div>
                  
                  </div>
                  
				    {{-- <div class="col-lg-4">
			            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
			                <div class="card-header text-center">Total Approved</div>
			                <div class="card-body bg-light text-dark">
			                    <h3 class="card-title text-center">{{$total_approved}}</h3>
			                </div>
			            </div>
				    </div>
				    <div class="col-lg-4">
			            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
			                <div class="card-header text-center">Total Rejected</div>
			                <div class="card-body bg-light text-dark">
			                    <h3 class="card-title text-center">{{$total_rejected}}</h3>
			                </div>
			            </div>
				    </div>
				    <div class="col-lg-4">
			            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
			                <div class="card-header text-center">Total Reapplied</div>
			                <div class="card-body bg-light text-dark">
			                    <h3 class="card-title text-center">{{$total_re_applied}}</h3>
			                </div>
			            </div>
				    </div>
				</div> --}}
				
				<div class="table-responsive">
                 <table class="table table-hover mb-0">
						<thead>
							<th>Sno.</th>
							<th>
								Student Name
							</th>
							<th>
								Travel To
							</th>
							<th>
								Status
							</th>
							<th>
								Re-applied
							</th>
							
						</thead>
							<tbody>
						@if($visas->count()>0)
						<?php $i = 1;?>
						@foreach($visas as $visa)
								<tr><th scope="row">{{$i++}}</th>
									<td>
										<a href="{{route('student.details',['id'=>$visa->student->id])}}">
											{{$visa->student->first_name}} {{$visa->student->last_name}}
										</a>
									</td>
									<td>{{$visa->travel_to}}</td>

									@if($visa->approved == 'no' and $visa->rejected == 'no')
										<td>
											<a href="{{route('visa.approve',['id'=>$visa->id])}}">
												<input name="approve" type="submit" value="Approve" class="btn btn-sm btn-success">
											</a>
											<a href="{{route('visa.reject',['id'=>$visa->id])}}">
												<input name="reject" type="submit" value="Reject" class="btn btn-sm btn-danger">
											</a>
										</td>
									@elseif($visa->approved == 'yes')
										<td>
											{{"Approved"}}
										</td>
									@elseif($visa->rejected == 'yes')
										<td>
											{{'rejected'}}
										</td>
									@endif
									<td>
										@if($visa->approved == 'yes')
											{{"--"}}
										@elseif($visa->rejected == 'yes')
											{{"--"}}
										@elseif($visa->re_apply == 'yes' and $visa->rejected == 'no')
											<strong>{{'Re-applied'}}</strong>
										@endif
									</td>
								</tr>
						@endforeach
						@else
						<tr>
							<th colspan="5" class="text-center">No visas!!</th>
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




{{-- <input type="radio" name="rejected{{$visa->id}}" value="yes" 
								{{($visa->rejected == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="rejected{{$visa->id}}" value="no"
								{{($visa->rejected == 'no')?"checked":" "}}>No --}}