@extends('layouts.frontend')
@section('title')
Agent Business
@stop

@section('header')
    <div class="content-header row">
    <div class="content-header col-md-6 col-12 mb-1">
      <h3 class="content-header-title"><strong>Agent Business</strong></h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item"><a href="{{route('agents')}}">Agents</a>
          </li>
          <li class="breadcrumb-item">Agent Buisness</li>
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

                <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="{{route('studentList',['id'=>$agent->id])}}" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">No. of students</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->students}}
                        </h3>
                      </div>
                  </a>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="info">Contract Status</h5><br>
                        <h4>
                          @if($contracts->count()>0)
                            @if($contracts[0]->active == 'yes')
                            <span class="text-info">Active</span>
                            @elseif($contracts[0]->expired == 'yes')
                            <span class="text-danger">Expired</span>
                            @elseif($contracts[0]->declined == 'yes')
                            <span class="text-danger">Declined</span>
                            @endif
                          @else
                            <span class="text-primary">No Contracts</span>
                          @endif
                        </h4>
                      </div>
                  
                    </div>
                </div>

                        <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    
                    <div class="my-1 text-center">
                        <a href="#" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="primary">Total revenue</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->revenue}}</h3>
                      </div>
                  </a>
                    </div> 
                </div>
            

                <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="#" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Commission</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->commission}}
                        </h3>
                      </div>
                  </a>
                    </div>
                </div>

             {{--    <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                        <a href="{{route('agent.files',['id'=>$agent->id])}}" style="text-decoration: none;">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Total files</h5>
                        <h3 class="font-large-2 text-bold-200">{{$agent->total_files}}
                        </h3>
                      </div>
                  </a>
                    </div>
                </div> --}}
                
                
            </div>
        </div>
    </div>
    </div>
    </div>

	</div>
    
        <div class="text-center">
    <a href="{{route('summary',['id'=>$agent->id])}}" class="btn btn-info">Agent Summary</a>
    <a href="{{route('agent.details',['id'=>$agent->id])}}" class="btn btn-info">View Profile</a>
    <a href="" class="btn btn-info" hidden>File Progress</a>
    </div>

@stop