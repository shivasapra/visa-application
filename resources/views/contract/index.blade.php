@extends("layouts.frontend")
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
@section('content')
    <div class="content-header text-center">
      <h3 class="content-header-title">Contracts</h3>
    </div>
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
                          Subject
                        </th>
                        <th>
                          Agent
                        </th>
                        <th>
                          Contract value
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
                      </tr>
                      </thead>
                    <tbody>
                      @if($contracts->count()>0)
                        @foreach($contracts as $contract)
                          <tr>
                            <th scope="row">{{$contract->id}}</th>
                            <td><a href="{{route('contract.details',['id'=>$contract->id])}}">{{$contract->subject}}</a>
                            </td>
                            <td>{{$contract->agent->name}}</td>
                            <td>{{'$'.$contract->contract_value}}</td>
                            <td>{{$contract->start_date}}</td>
                            <td>{{$contract->end_date}}</td>
                           <td>
                             @if($contract->signed == 'no')
                              {{"Not Signed"}}
                             @else 
                              <div class="success">{{'Signed'}}</div>
                             @endif
                           </td>
                            <td><a href="{{route('contract.delete',['id'=>$contract->id])}}" class="btn btn-sm btn-danger">Delete</a>
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