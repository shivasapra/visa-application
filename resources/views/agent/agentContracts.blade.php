@extends('layouts.app')
@section('content')
	
	<div class="card-header text-center"><strong> Contracts under "{{$agent->name}}"</strong></div>
	<div class="card-body">
		
		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Active Contracts</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->active_c}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Expired Contracts</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->expired_c}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">About to expired</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->about_to_expired_c}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Recently Added</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->added_c}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>

		<div class="row">
		    <div class="col-lg-6">
		        <a href="" style="text-decoration: none;">
		            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
						<div class="card-header text-center">Declined</div>
		            </div>
		        </a>
		    </div>
		    <div class="col-lg-6">
		    	<div class="card text-white bg-info mb-3" style="max-width: 18rem;">
		    		<div class="card-body bg-light text-dark" style="max-height: 3rem";>
                    <h3 class="card-title text-center">{{$agent->declined_c}}</h3>
                </div>
		    	</div>	
		    </div>
		</div>


    </div>
	</div>
@stop