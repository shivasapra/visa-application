@extends("layouts.frontend")
@section('title')
Student Details
@stop
@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/vendors.css")}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/app.css")}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/menu/menu-types/vertical-menu.css")}}">
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/app-assets/css/core/colors/palette-callout.css")}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset("app/front/assets/css/style.css")}}">
  <!-- END Custom CSS-->
@endsection
@section('header')
    <div class="content-header row">
	<div class="content-header col-md-6 col-12 mb-1">
    	<h3 class="content-header-title"><strong>{{$student->first_name}}'s </strong>Details:</h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item"><a href="{{route('students')}}">Students</a>
	        </li>
	        <li class="breadcrumb-item">Student's details</li>
	      </ol>
	    </div>
	  </div>
	</div>
@stop
@section('content')
	<div class="content-body">
		<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="table-responsive">
                 <table class="table table-hover mb-0">
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
						<div class="row">
							<tr>
								<td><strong>Passport No:</strong></td>
								<td>{{$student->passport_no}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Country of origin:</strong></td>
								<td>{{$student->passport_country}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Issued Date:</strong></td>
								<td>{{$student->passport_issue}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>Expire Date:</strong></td>
								<td>{{$student->passport_expire}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>10th Percentage:</strong></td>
								<td>{{$student->tenth_percentage}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>10th Passing year:</strong></td>
								<td>{{$student->tenth_year}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>10th Board:</strong></td>
								<td>{{$student->tenth_board}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>12th Percentage:</strong></td>
								<td>{{$student->twelveth_percentage}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>12th Passing Year:</strong></td>
								<td>{{$student->twelveth_year}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>12th Board:</strong></td>
								<td>{{$student->twelveth_board}}</td>
							</tr>
						</div>
						<div class="row">
							<tr>
								<td><strong>12th stream:</strong></td>
								<td>{{$student->twelveth_stream}}</td>
							</tr>
						</div>

					</tbody>
				</table>
				</div>
			</div>
		</div>
		<div class="text-center">
			<a href="{{route('visa.details',['id'=>$student->id])}}" class="btn btn-sm btn-info">Visa Details</a>
		</div>
		{{-- <div class="col-md-4" >
    <select class="company">
          <option value=''><strong>Name</strong></option>
          <option value="Company A">Company A</option>
          <option value="Company B">Company B</option>
    </select>
</div>
<div class="col-md-4" >
    <select class="product">
          <option value=''><strong>Products</strong></option>
    </select>
</div> --}}
	</div>
	</div>
	</div>		
@stop
@section('js')
	<script src="{{asset("app/front/app-assets/vendors/js/vendors.min.js")}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN STACK JS-->
  <script src="{{asset("app/front/app-assets/js/core/app-menu.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/core/app.js")}}" type="text/javascript"></script>
  <script src="{{asset("app/front/app-assets/js/scripts/customizer.js")}}" type="text/javascript"></script>
  <!-- END STACK JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <!-- END PAGE LEVEL JS-->
  {{-- <script>
  	var series = [
{name: 'Company A', product: 'A1'},
{name: 'Company A', product: 'A2'},
{name: 'Company A', product: 'A3'},
{name: 'Company B', product: 'B1'},
{name: 'Company B', product: 'B2'}
]

$(".company").change(function(){
    var company = $(this).val();
    var options =  '<option value=""><strong>Products</strong></option>'; //create your "title" option
    $(series).each(function(index, value){ //loop through your elements
        if(value.name == company){ //check the company
            options += '<option value="'+value.product+'">'+value.product+'</option>'; //add the option element as a string
        }
    });

    $('.product').html(options); //replace the selection's html with the new options
});
  </script> --}}
@endsection