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
              <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                  <a href="{{route('contracts')}}">
                    <div class="my-1 text-center">  
                      <div class="card-header mb-2 pt-0">
                        <h5 class="info">Total Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$contracts->count()}}
                        </h3>
                      </div>
                    </div>
                    </a>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                  <a href="{{route('active.contracts')}}">
                    <div class="my-1 text-center">  
                      <div class="card-header mb-2 pt-0">
                        <h5 class="success">Active Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$active->count()}}
                        </h3>
                      </div>
                    </div>
                    </a>
                </div>
                
                
                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                  <a href="{{route('expired.contracts')}}">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Expired Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$expired->count()}}
                        </h3>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                  <a href="{{route('declined.contracts')}}">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Declined contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$declined->count()}}
                        </h3>
                      </div>
                      
                    </div>
                  </a>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                  <a href="{{route('signed.contracts')}}">
                    <div class="my-1 text-center">
                        
                      <div class="card-header mb-2 pt-0">
                        <h5 class="success">Signed Contracts</h5>
                        <h3 class="font-large-2 text-bold-200">{{$signed->count()}}
                        </h3>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-content collapse show">
            <div class="row">
              <div class="table-responsive">
               <table class="table table-hover mb-0">
                  <thead>
                    <tr>
                      <th>Sno.</th>
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
                        Status
                      </th>
                      <th>
                        Action
                      </th>
                    </tr>
                    </thead>
                  <tbody>
                    @if($contracts->count()>0)
                    <?php $i = 1;?>
                      @foreach($contracts as $contract)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$contract->agent->name}}</a></td>
                          <td>{{$contract->percentage."%"}}</td>
                          <td>{{$contract->start_date}}</td>
                          <td>{{$contract->end_date}}</td>
                         <td>
                           @if($contract->active == 'yes')
                            @if($contract->signed == 'no')
                              <div class="info">{{"Active"}}</div>
                            @else
                              <div class="success">{{"Signed"}}</div>
                            @endif
                           @elseif($contract->declined == 'yes')
                            <div class="danger">{{'Declined'}}</div>
                           @elseif($contract->expired == 'yes')
                            <div class="danger">{{"Expired"}}</div>
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
        </div>
            <div class="text-center">
                <a href="{{route('contract.create')}}" class="btn btn-sm btn-info">New Contract</a>
                </div>
          </div>
        </div>
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