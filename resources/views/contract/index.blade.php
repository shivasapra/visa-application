@extends("layouts.frontend")
@section('title')
Contracts
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
      <h3 class="content-header-title"><strong>Contracts</strong></h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
      <div class="breadcrumb-wrapper col-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
          </li>
          <li class="breadcrumb-item">Contracts
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
            <div class="card">
              <div class="card-content collapse show">
                <div class="table-responsive">
                 <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>
                          Agent
                        </th>
                        <th>
                          Percentage
                        </th>
                        <th>
                          Start Date
                        </th>
                        <th>
                          End Date
                        </th>
                        <th>
                          Signed
                        </th>
                        <th>
                          Action
                        </th>
                      </tr>
                      </thead>
                    <tbody>
                      @if($contracts->count()>0)
                        @foreach($contracts as $contract)
                          <tr>
                            <th scope="row">{{$contract->id}}</th>
                            <td>{{$contract->agent->name}}</a></td>
                            <td>{{$contract->percentage."%"}}</td>
                            <td>{{$contract->start_date}}</td>
                            <td>{{$contract->end_date}}</td>
                           <td>
                             @if($contract->signed == 'no')
                              {{"Not Signed"}}
                             @else 
                              <div class="success">{{'Signed'}}</div>
                             @endif
                           </td>
                            <td>
                              <a href="{{route('contract.delete',['id'=>$contract->id])}}" class="btn btn-sm btn-danger">Delete</a>
                              <a href="{{route('contract.details',['id'=>$contract->id])}}" class="btn btn-sm btn-success">view</a>
                              <a href="{{route('contract.edit',['id'=>$contract->id])}}" class="btn btn-sm btn-info">Edit</a>
                           </td>
                        </tr>
                        @endforeach
                        @else
                          <tr>
                            <th colspan="5" class="text-center">No Contracts!!</th>
                          </tr>
                        @endif
                    </tbody>
                </table>
                </div>
              </div>
            </div>
              <div class="text-center">
                  <a href="{{route('contract.create')}}" class="btn btn-sm btn-info">New Contract</a>
                  </div>
          </div>
        </div>
      </div>
@endsection
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
@endsection