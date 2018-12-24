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




	<div class="card-header">Apply for visa</div>
		<div class="card-body">
			<form action="{{route('visa.store')}}" method='post'>
				{{csrf_field()}}
				<div class="form-group">
					<label for="student_id">Student</label><br>
				<select name="student_id" class="form-control" >
					 <option value="{{$student->id}}">{{$student->first_name}}</option>
				</select>
				</div>
				<div class="form-group">
					<label for="travel_to">Travel To:</label>
					<input type="text" name='travel_to' class="form-control">
				</div>
				<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Apply</button>
					</div>
				</div>
				
			</form>
		</div>


@stop