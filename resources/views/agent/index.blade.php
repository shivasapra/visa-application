@extends('layouts.app')
@section('content')
	
{{-- <div class="content">
    <div class="row">
        <div class="col-md-12">    
            <div class="panel_s">
                <div class="panel-body">
                    <div class="_buttons">
                        <a href="{{route('agent.create')}}" class="btn btn-info mright5 test pull-left display-block">New Customer</a>
                        <div class="visible-xs"><div class="clearfix"></div></div>
                    </div>
                    <div class="clearfix"></div><hr class="hr-panel-heading" />
                </div>
            </div>
            <div class="clearfix mtop20"></div>
            <div class="">
            	<table class="table table-hover">
            		<thead>
            			<tr><th><span class="hide"> - </span></th>
            				<th>#</th>
            				<th>Name</th>
            				<th>Email</th>
            				<th>id proof</th>
            				<th>license</th>
            				<th>photo</th>
            			</tr>
            		</thead>
            		<tbody>
            			@if($agents->count()>0)
							@foreach($agents as $agent)
								<tr>
								<td><a href={{route('agent.business',['id'=>$agent->id])}}>{{$agent->name}}</a></td>
								<td>{{$agent->email}}</td>
								<td>
									<img class="img-responsive menu-thumbnails" src="{{asset($agent->id_proof)}}"  width="30px" height="30px"/>
								</td>
								<td>
									<img class="img-responsive menu-thumbnails" src="{{asset($agent->license)}}"  width=30px" height="30px"/>
								</td>
								<td>
									<img class="img-responsive menu-thumbnails" src="{{asset($agent->photo)}}"  width="30px" height="30px"/>
								</td>
								<td>
									
								</td>
							@endforeach
						@else
							<tr>
							<th colspan="5" class="text-center">No Agents</th>
							</tr>
						@endif
            		</tbody>
            	</table>
            </div>
       </div>
    </div>
</div>
 --}}


	<div class="card-header text-center"><strong>Agents</strong></div>
	<div class="card-body">
		
		<table class="table table-hover">
			<thead>
				<th>
					Name
				</th>
				<th>
					Email
				</th>
				<th>
					id proof
				</th>
				<th>
					license
				</th>
				<th>
					photo
				</th>
			</thead>
			<tbody>
				@if($agents->count()>0)
					@foreach($agents as $agent)
					<tr>
						<td><a href={{route('agent.business',['id'=>$agent->id])}}>{{$agent->name}}</a></td>
						<td>{{$agent->email}}</td>
						<td>
							<img class="img-responsive menu-thumbnails" src="{{asset($agent->id_proof)}}"  width="30px" height="30px"/>
						</td>
						<td>
							<img class="img-responsive menu-thumbnails" src="{{asset($agent->license)}}"  width=30px" height="30px"/>
						</td>
						<td>
							<img class="img-responsive menu-thumbnails" src="{{asset($agent->photo)}}"  width="30px" height="30px"/>
						</td>
						<td>
							
						</td>
					@endforeach
				@else
					<tr>
						<th colspan="5" class="text-center">No Agents</th>
					</tr>
				@endif
			</tbody>
		</table>
		<div class="text-center">
<a href="{{route('agent.create')}}" class="btn btn-sm btn-info">Add Agent</a>
				</div>
	</div>
	</div>

@stop