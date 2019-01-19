@extends("layouts.frontend")
@section('title')
Report: Offer Letter
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
    	<h3 class="content-header-title"><strong>Report: Offer Letter</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">Report: Offer Letter
	        </li>
	      </ol>
	    </div>
	  </div>
	</div>
@stop
@section('content')
    <div class="content-body">
		<div class="row">
          <div class="col-12">
          	<div id="tab">
	            <div class="card">
	              <div class="card-content collapse show">
	                <div class="table-responsive">
	                 <table class="table table-hover mb-0">
	                    <thead>
	                      <tr>
	                        <th>Sno.</th>
	                        <th>
								Name
							</th>
							<th>
								Email
							</th>
							<th>
								Gender
							</th>
							<th>
								Offer Letter Date
							</th>
	                      </tr>
	                    	</thead>
	                    <tbody>
	                    	@if($students->count()>0)
	                    	<?php $i = 1;?>
								@foreach($students as $student)
			                      <tr>
			                        <th scope="row">{{$i++}}</th>
			                        <td>
										{{$student->first_name.' '.$student->last_name}}</a>
									</td>
									<td>{{$student->email}}</td>
									<td>{{$student->gender}}</td>
									<td><strong>{{$student->offer_letter_date}}</strong></td>
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
	              </div>
	            </div>
            </div>
            <div class="text-center">
				<input type="button" value="Export" 
            id="btPrint" class="btn btn-sm btn-success" onclick="createPDF()" />
			</div>
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
  <script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
@endsection