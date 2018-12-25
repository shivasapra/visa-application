@extends('layouts.frontend')
@section('content')
	<div class="content-header text-center">
    <h3 class="content-header-title"><strong>Agent Business -> {{$agent->name}}</strong></h3>
    </div>
	<div class="content-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="{{route('studentList',['id'=>$agent->id])}}" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">No. of students</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->students}}
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="81" class="knob hide-value responsive angle-offset" data-angleOffset="20"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FFA87D" data-knob-icon="icon-energy">
                      </div>
                  </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="{{route('agent.contracts',['id'=>$agent->id])}}" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Total Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->contracts}}
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleOffset="0"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FF7588" data-knob-icon="icon-pointer">
                      </div>
                  </a>
                    </div>
                </div>

                        <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    
                    <div class="my-1 text-center">
                        <a href="#" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="primary">Total revenue</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->revenue}}</h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleOffset="40"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#00B5B8" data-knob-icon="icon-trophy">
                      </div>
                  </a>
                    </div> 
                </div>
            </div>
        		
                <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="#" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Commission</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->commission}}
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="81" class="knob hide-value responsive angle-offset" data-angleOffset="20"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FFA87D" data-knob-icon="icon-energy">
                      </div>
                  </a>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="{{route('agent.files',['id'=>$agent->id])}}" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Total files</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->total_files}}
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleOffset="0"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FF7588" data-knob-icon="icon-pointer">
                      </div>
                  </a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    </div>
    </div>

	</div>
    
        <div class="text-center">
    <a href="{{route('summary',['id'=>$agent->id])}}" class="btn btn-info">Agent Summary</a>
    </div>

@stop