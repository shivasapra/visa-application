@extends("layouts.app")
@section('content')
	<div class="card-header text-center"><strong>{{$student->first_name}}'s </strong>Visa details</div>
	<div class="card-body">
		
		<table class="table table-hover">
			<thead>
				<th>
					Travel To
				</th>
				<th>
					Approved
				</th>
				<th>
					Rejected
				</th>
				<th>
					Re-applied
				</th>
				
			</thead>
			<tbody>
				@if($visas->count()>0)
					@foreach($visas as $visa)
					<tr>
						<td>
							{{$visa->travel_to}}
						</td>
						<td>{{$visa->approved}}</td>
						<td>{{$visa->rejected}}</td>
						<td>
							@if($visa->re_apply == 'no')
								<a href="{{route('visa.details.update',['id'=>$visa->id])}}" class="btn btn-sm btn-success">Re-Apply</a>
							@else
								{{"Re-applied"}}
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
		<div class="row">
		    <div class="col-lg-4">
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
		    </div>
		</div>
@stop