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




	<div class="card-header">Create Agent</div>
		<div class="card-body">
			<form action="{{route('agent.store')}}" method='post' enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name='name' class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name='email' class="form-control">
				</div>
				<div class="form-group">
					<label for="id_proof">Id Proof</label>
					<input type="file" name='id_proof' class="form-control">
				</div>
				<div class="form-group">
					<label for="license">License</label>
					<input type="file" name='license' class="form-control">
				</div>
				<div class="form-group">
					<label for="photo">photo</label>
					<input type="file" name='photo' class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Add Agent</button>
					</div>
				</div>
				
			</form>
		</div>


@stop