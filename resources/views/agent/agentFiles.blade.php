@extends('layouts.frontend')
@section('content')
	
	<div class="card-header text-center"><strong> Files under "{{$agent->name}}"</strong></div>
	<div class="card-body">
		
		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Not started</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->files_not_started}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">In Process</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->files_in_process}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">In Hold</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->files_in_hold}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Canceled</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->files_canceled}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Finished</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->files_finished}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>


    </div>
	</div>
@stop