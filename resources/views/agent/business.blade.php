@extends('layouts.app')
@section('content')
	
	<div class="card-header text-center"><strong>Agent Business -> {{$agent->name}}</strong></div>
	<div class="card-body">
		
				<div class="row">
    <div class="col-lg-3">
        <a href="{{route('studentList',['id'=>$agent->id])}}" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-header text-center">No. of students</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$agent->students}}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="{{route('agent.contracts',['id'=>$agent->id])}}" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-header text-center">Total Contracts</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$agent->contracts}}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="#" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-header text-center">Total revenue</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$agent->revenue}}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-3">
        <a href="#" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
				<div class="card-header text-center">Commission</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$agent->commission}}</h3>
                </div>
            </div>
        </a>
    </div>
    
</div>
	</div>

@stop