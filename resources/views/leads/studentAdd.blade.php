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




	<div class="card-header text-center"><strong>Converting lead into student</strong></div>
		<div class="card-body">
			<form action="{{route('convert.lead',['id'=>$lead->id])}}" method='post'>
				{{csrf_field()}}
				<div class="form-group">
				<label for="agent_id">Select agent</label><br>
				<select name="agent_id" class="form-control" >
					
					 <option value="{{$lead->agent_id}}" >{{$lead->agent->name}}</option>
					
				</select>
				</div>
				<div class="form-group">
					<label for="first_name">First name</label>
					<input type="text" value="{{$lead->student_fname}}" name='first_name' class="form-control">
				</div>
				<div class="form-group">
					<label for="last_name">Last name</label>
					<input type="text" value="{{$lead->student_lname}}" name='last_name' class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name='email' value="{{$lead->email}}" class="form-control">
				</div>
				<div class="form-group">
					<label for="title">Title</label><br>
					<select name="title" class="form-control" >
					 <option value="Mr." >Mr.</option>
					 <option value="Mrs." >Mrs.</option>
					 <option value="Miss" >Miss</option>
				</select>
				</div>
				<div class="form-group">
					<label for="gender">Gender</label><br>
					<select name="gender" class="form-control" >
					 <option value="male" >Male</option>
					 <option value="female" >Female</option>
				</select>
				</div>
				<div class="form-group">
					<label for="first_language">First Language</label>
					<input type="text" name='first_language' class="form-control">
				</div>
				<div class="form-group">
					<label for="DOB">DOB</label>
					<input type="text" name='DOB' placeholder="dd/mm/yyyy" class="form-control">
				</div>
				<div class="form-group">
					<label for="Mobile">Moblie</label>
					<input type="text" value="{{$lead->Mobile}}" name='Mobile' class="form-control">
				</div>
				<div class="form-group">
					<label for="address">address</label>
					<input type="text" value="{{$lead->address}}" name='address' class="form-control">
				</div>
				<div class="form-group">
					<label for="postal_code">Postal code</label>
					<input type="text" name='postal_code' value="{{$lead->postal_code}}" class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add student</button>
					</div>
				</div>
				
			</form>
		</div>


@stop