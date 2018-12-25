@extends('layouts.frontend')
@section('content')
	
	<div class="content-header text-center">
    	<h3 class="content-header-title"><strong>File Progress Status</strong></h3>
    </div>
	<div class="content-body">
		<div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
				<div class="row">
              	<div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Total Files</h5>
                        <h3 class="font-large-2 text-bold-200">{{$total_files}}
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
                        <h5 class="danger">Files Not Started</h5>
                        <h3 class="font-large-2 text-bold-200">{{$files_not_started}}
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
                        <h5 class="primary">Files in Process</h5>
                        <h3 class="font-large-2 text-bold-200">{{$files_in_process}}</h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleOffset="40"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#00B5B8" data-knob-icon="icon-trophy">
                      </div>
                	</div> 
                </div>
               	</div>
				<div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Files In Hold</h5>
                        <h3 class="font-large-2 text-bold-200">{{$files_in_hold}}
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
                        <h5 class="danger">Files Canceled</h5>
                        <h3 class="font-large-2 text-bold-200">{{$files_canceled}}
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
                        <h5 class="primary">Files Finished</h5>
                        <h3 class="font-large-2 text-bold-200">{{$files_finished}}</h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleOffset="40"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#00B5B8" data-knob-icon="icon-trophy">
                      </div>
                	</div> 
                </div>
                </div>
		    </div>
			</div>
		</div>
	</div>
	</div>
@stop