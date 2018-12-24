@extends("layouts.frontend")
@section('content')
	<div class="card-header text-center"><strong>{{$agent->name}}'s</strong> Summary:</div>
	<div class="card-body">
		<form action="{{route('summary.update',['id'=>$agent->id])}}" method="post">
		{{csrf_field()}}
			<table class="table table-hover">
				<tbody>
					<div class="row">
						<tr>
							<td><strong>Interested:</strong></td>
							<td>
								<input type="radio" name="interested" value="yes" 
								{{($agent->interested == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="interested" value="no"
								{{($agent->interested == 'no')?"checked":" "}}>No
							</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Refused:</strong></td>
							<td>
								<input type="radio" name="refused" value="yes" 
								{{($agent->refused == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="refused" value="no"
								{{($agent->refused == 'no')?"checked":" "}}>No
							</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Proposal Sent:</strong></td>
							<td>
								<input type="radio" name="proposal_sent" value="yes" 
								{{($agent->proposal_sent == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="proposal_sent" value="no"
								{{($agent->proposal_sent == 'no')?"checked":" "}}>No
							</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Document Sent:</strong></td>
							<td>
								<input type="radio" name="document_sent" value="yes" 
								{{($agent->document_sent == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="document_sent" value="no"
								{{($agent->document_sent == 'no')?"checked":" "}}>No
							</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Agreement:</strong></td>
							<td>
								<input type="radio" name="agreement" value="yes" 
								{{($agent->agreement == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="agreement" value="no"
								{{($agent->agreement == 'no')?"checked":" "}}>No
							</td>
						</tr>
					</div>
					<div class="row">
						<tr>
							<td><strong>Certification:</strong></td>
							<td>
								<input type="radio" name="certification" value="yes" 
								{{($agent->certification == 'yes')?"checked":" "}}>Yes
								<input type="radio" name="certification" value="no"
								{{($agent->certification == 'no')?"checked":" "}}>No
							</td>
						</tr>
					</div>
				</tbody>
			</table>

			<div class="form-group">
					<div class="text-center">
						<button class="btn btn-success" type="submit">Save</button>
					</div>
			</div>
		</form>
	</div>

@stop