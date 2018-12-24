@extends('layouts.frontend')

@section('content')
	
	@if(count($errors)>0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li class="list_group-item text-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	@endif




	<div class="card-header">Create a new lead</div>
		<div class="card-body">
			<form action="{{route('lead.store')}}" method='post'>
				{{csrf_field()}}
				<div class="form-group">
				<label for="agent_id">Select Agent</label><br>
				<select name="agent_id" class="form-control">
					@foreach( $agents as $agent)
					 <option value="{{$agent->id}}">{{$agent->name}}</option>
					@endforeach
				</select>
				</div>
				<div class="form-group">
					<label for="student_fname">First name</label>
					<input type="text" name='student_fname' class="form-control">
				</div>
				<div class="form-group">
					<label for="student_lname">Last name</label>
					<input type="text" name='student_lname' class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name='email' class="form-control">
				</div>
				<div class="form-group">
					<label for="Mobile">Moblie</label>
					<input type="text" name='Mobile' class="form-control">
				</div>
				<div class="form-group">
					<label for="address">address</label>
					<input type="text" name='address' class="form-control">
				</div>
				<div class="form-group">
					<label for="postal_code">Postal code</label>
					<input type="text" name='postal_code' class="form-control">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" cols="5" rows="5" class="form-control"></textarea>
					
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add lead</button>
					</div>
				</div>
				
			</form>
		</div>


@stop