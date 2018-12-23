@extends("layouts.app")
@section('content')	
	<div class="row">
	    <div class="col-lg-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Total Approved</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$total_approved}}</h3>
                </div>
            </div>
	    </div>
	    <div class="col-lg-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Total Rejected</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$total_rejected}}</h3>
                </div>
            </div>
	    </div>
	    <div class="col-lg-4">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Total Reapplied</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$total_re_applied}}</h3>
                </div>
            </div>
	    </div>
	</div>
	
	<table class="table table-hover">
			<thead>
				<th>
					Student Name
				</th>
				<th>
					Travel To
				</th>
				<th>
					Status
				</th>
				<th>
					Re-applied
				</th>
				
			</thead>
			@foreach($visas as $visa)
				<tbody>
					<tr>
						<td>
							<a href="{{route('student.details',['id'=>$visa->student->id])}}">
								{{$visa->student->first_name}} {{$visa->student->last_name}}
							</a>
						</td>
						<td>{{$visa->travel_to}}</td>

						@if($visa->approved == 'no' and $visa->rejected == 'no')
							<td>
								<a href="{{route('visa.approve',['id'=>$visa->id])}}">
									<input name="approve" type="submit" value="Approve" class="btn btn-sm btn-success">
								</a>
								<a href="{{route('visa.reject',['id'=>$visa->id])}}">
									<input name="reject" type="submit" value="Reject" class="btn btn-sm btn-danger">
								</a>
							</td>
						@elseif($visa->approved == 'yes')
							<td>
								{{"Approved"}}
							</td>
						@elseif($visa->rejected == 'yes')
							<td>
								{{'rejected'}}
							</td>
						@endif
						<td>{{$visa->re_apply}}</td>
					</tr>
				</tbody>
			@endforeach
	</table>
@stop





{{-- <input type="radio" name="rejected{{$visa->id}}" value="yes" 
								{{($visa->rejected == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="rejected{{$visa->id}}" value="no"
								{{($visa->rejected == 'no')?"checked":" "}}>No --}}