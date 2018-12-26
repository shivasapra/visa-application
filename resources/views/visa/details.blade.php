@extends("layouts.frontend")
@section('title')
Visa Details
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
    <h3 class="content-header-title"><strong>{{$student->first_name}}'s</strong>Visa details</h3>
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
					Travel To
				</th>
				<th>
					Status
				</th>
				<th>
					Re-apply
				</th>
				
			</thead>
			<tbody>
				@if($visas->count()>0)
					@foreach($visas as $visa)
					<tr><th scope="row">{{$visa->id}}</th>
						<td>
							{{$visa->travel_to}}
						</td>
						<td>@if($visa->approved == 'yes')
							{{'Approved'}}
							@elseif($visa->rejected == 'yes')
							{{'Rejected'}}
							@else
							{{"Pending"}}
							@endif
						</td>
						<td>
							@if($visa->rejected == 'yes' and $visa->approved == 'no')
								<a href="{{route('visa.details.update',['id'=>$visa->id])}}" class="btn btn-sm btn-success">Re-Apply</a>
							@elseif($visa->approved == 'yes' and $visa->rejected == 'no')
								{{"--"}}
							@elseif($visa->approved == 'no' and $visa->rejected == 'no')
								{{'--'}}
							@elseif($visa->visa_re_apply == 'yes')
								{{'Re-applied'}}
							@endif
						</td>
					</tr>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">You didn't applied for any visa</th>
					</tr>
				@endif

			</tbody>
		</table>
	</div>
		<div class="row">
			<div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Total Approved</h5>
                        <h3 class="font-large-2 text-bold-200">{{$student->visa_approved}}
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
                        <h3 class="font-large-2 text-bold-200">{{$student->visa_rejected}}
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
                        <h3 class="font-large-2 text-bold-200">{{$student->visa_re_applied}}</h3>
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
	                    <h3 class="card-title text-center">{{$student->visa_approved}}</h3>
	                </div>
	            </div>
		    </div>
		    <div class="col-lg-4">
	            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
	                <div class="card-header text-center">Total Rejected</div>
	                <div class="card-body bg-light text-dark">
	                    <h3 class="card-title text-center">{{$student->visa_rejected}}</h3>
	                </div>
	            </div>
		    </div>
		    <div class="col-lg-4">
	            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
	                <div class="card-header text-center">Total Reapplied</div>
	                <div class="card-body bg-light text-dark">
	                    <h3 class="card-title text-center">{{$student->visa_re_applied}}</h3>
	                </div>
	            </div>
		    </div> --}}
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