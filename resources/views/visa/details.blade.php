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
						<td>{{$visa->re_applied}}</td>
					</tr>
					@endforeach
				
				@else
					<tr>
						<th colspan="5" class="text-center">You didn't applied for any visa</th>
					</tr>
				@endif

			</tbody>
		</table>
@stop