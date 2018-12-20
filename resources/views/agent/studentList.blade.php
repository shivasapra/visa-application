@extends("layouts.app")
@section('content')
	<div class="card-header text-center"><strong>Students under "{{$agent->name}}"</strong></div>
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
					Gender
				</th>
				
			</thead>
			<tbody>
				@if($students->count()>0)
					@foreach($students as $student)
					<tr>
						<td>
							{{$student->first_name}}
						</td>
						<td>{{$student->last_name}}</td>
						<td>{{$student->email}}</td>
						<td>{{$student->gender}}</td>
						{{-- <td>
							<a href="{{route('post.edit',['id' => $post->id])}}" class="btn btn-sm btn-info">Edit</a>
							<a href="{{route('post.delete',['id' => $post->id])}}" class="btn btn-sm btn-danger">Trash</a>
						</td> --}}
					</tr>
					@endforeach
				
				@else
					<tr>
						<th colspan="5" class="text-center">No Students!!</th>
					</tr>
				@endif

			</tbody>
		</table>
	</div>
@stop