@extends("layouts.app")
@section('content')
	<div class="card-header text-center"><strong>Lead->{{$lead->student_fname}}</strong></div>
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
				
					<tr>
						<td>
							{{$lead->student_fname}}
						</td>
						<td>{{$lead->student_lname}}</td>
						<td>{{$lead->email}}</td>
						
						<td>
							
								<form action="{{route('status.save',['id'=>$lead->id])}}" method="post">
										{{csrf_field()}}
										<div class="row">
								<div class="col-sm-6">
									<select name="status" class="form-control">
									 <option value="0">Not processed</option>
									 <option value="1">Processing</option>
									</select>
								</div>
								<div class="col-sm-6">
									<input type="submit" class="btn-sm btn-success" value="save">
								</div></div>
								</form>
							
						</td>
					
					</tr>
					
			</tbody>
		</table>
	</div>
@stop