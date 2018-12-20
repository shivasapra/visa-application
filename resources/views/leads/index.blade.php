@extends("layouts.app")
@section('content')
	<div class="card-header text-center"><strong>Leads</strong></div>
	<div class="card-body">
		
		<table class="table table-hover">
			<thead>
				<th>
					First Name
				</th>
				<th>
					Last Name
				</th>
				<th>
					Email
				</th>
				<th>
					status
				</th>
				
			</thead>
			<tbody>

				@if($leads->count()>0)
					@foreach($leads as $lead)
					<tr>
						<td>
							{{$lead->student_fname}}
						</td>
						<td>{{$lead->student_lname}}</td>
						<td>{{$lead->email}}</td>
						<td>
							@if($lead->status == 0)
								Not processed
								<a href="{{route('status.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
							@elseif($lead->status == 1)
								Processing
									<a href="{{route('student.add',['id'=>$lead->id])}}" class="btn btn-sm btn-success">Add student</a>
									<a href="{{route('status.edit',['id'=>$lead->id])}}" class="btn btn-sm btn-info">Edit</a>
							@else
								<a href="{{route('details.lead',['id'=>$lead->id])}}">Processed</a>
							@endif
							
						</td>

						{{-- <td>
							<a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-sm btn-info">Edit</a>
							<a href="{{route('post.delete',['id' => $post->id])}}" class="btn btn-sm btn-danger">Trash</a>
						</td> --}}
					</tr>
					@endforeach
				
				@else
					<tr>
						<th colspan="5" class="text-center">No leads!!</th>
					</tr>
				@endif

			</tbody>
		</table>
	<div class="text-center">
					<a href="{{route('lead.create')}}" class="btn btn-sm btn-info">Add lead</a>
				</div>
	</div>
@stop