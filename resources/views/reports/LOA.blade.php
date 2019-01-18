@extends("layouts.frontend")
@section('title')
Report: LOA
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
    	<h3 class="content-header-title"><strong>Report: LOA</strong></h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">Report: LOA
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
          	<div id="target">
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
								LOA Date
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
									<td><strong>{{$student->Loa_date}}</strong></td>
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
				<button id="btnExport" class=" btn btn-info btn-sm" onclick="Export()">Export</button>
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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function Export() {
            html2canvas(document.getElementById('target'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 550
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        }
    </script>
@endsection