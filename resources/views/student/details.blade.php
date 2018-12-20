@extends("layouts.app")
@section('content')
	<div class="card-header text-center"><strong>{{$student->first_name}}'s</strong> Details:</div>
	<div class="card-body">
		
		<table class="table table-hover">
			<tbody>
				<div class="row">
					<tr>
						<td><strong>Agent:</strong></td>
						<td>{{$student->agent->name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>First Name:</strong></td>
						<td>{{$student->first_name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Last Name:</strong></td>
						<td>{{$student->last_name}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Email:</strong></td>
						<td>{{$student->email}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Title:</strong></td>
						<td>{{$student->title}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Gender:</strong></td>
						<td>{{$student->gender}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>First Language:</strong></td>
						<td>{{$student->first_language}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>DOB:</strong></td>
						<td>{{$student->DOB}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Mobile:</strong></td>
						<td>{{$student->Mobile}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Address:</strong></td>
						<td>{{$student->address}}</td>
					</tr>
				</div>
				<div class="row">
					<tr>
						<td><strong>Postal Code:</strong></td>
						<td>{{$student->postal_code}}</td>
					</tr>
				</div>
			</tbody>
		</table>
	</div>
@stop