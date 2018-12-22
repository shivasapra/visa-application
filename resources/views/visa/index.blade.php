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
					Approved
				</th>
				<th>
					Rejected
				</th>
				<th>
					Re-applied
				</th>
				
			</thead>
		</table>
			@foreach($visas as $visa)
			<form action="{{route('visa.update',['id'=>$visa->id])}}" method="post">
						{{csrf_field()}}
			<table class="table table-hover">
				<tbody>
					<tr>
						<td>
							<a href="{{route('student.details',['id'=>$visa->student->id])}}">
								{{$visa->student->first_name}} {{$visa->student->last_name}}
							</a>
						</td>
						<td>{{$visa->travel_to}}</td>

						<td>
							<input type="radio" name="approved{{$visa->id}}" value="yes" 
								{{($visa->approved == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="approved{{$visa->id}}" value="no"
								{{($visa->approved == 'no')?"checked":" "}}>No
						</td>
						<td>
							<input type="radio" name="rejected{{$visa->id}}" value="yes" 
								{{($visa->rejected == 'yes')?"checked":" "}}>Yes
							<input type="radio" name="rejected{{$visa->id}}" value="no"
								{{($visa->rejected == 'no')?"checked":" "}}>No
						</td>

						<td>{{$visa->re_apply}}</td>
						<td><input type="submit" value="Save" class="btn btn-sm btn-success"></td>
						
					</tr>
					</tbody>
					</table>
					</form>
					@endforeach
		
		
		
@stop