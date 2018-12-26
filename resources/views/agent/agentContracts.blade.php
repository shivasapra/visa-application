@extends('layouts.frontend')
@section('title')
Agent Contracts
@stop
@section('header')
    <div class="content-header row">
    <div class="content-header col-md-6 col-12 mb-1">
      <h3 class="content-header-title"><strong>Contracts under "{{$agent->name}}</strong></h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agents')}}">Agents</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agent.business',['id'=>$agent->id])}}">Agent Buisness</a></li>
          <li class="breadcrumb-item">Agent's contracts</li>
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

                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="success">Active Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->active_c}}
                        </h3>
                      </div>
                    </div>
                </div>

                

                        <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    
                    <div class="my-1 text-center">
                       
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">About to expired</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->about_to_expired_c}}</h3>
                      </div>
                      </div> 
                </div>
            
        		
                

                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="info">Recently Added</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->added_c}}
                        </h3>
                      </div>
                      </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Expired Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->expired_c}}
                        </h3>
                      </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Declined contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->declined_c}}
                        </h3>
                      </div>
                      
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="success">Signed Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->signed_c}}
                        </h3>
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