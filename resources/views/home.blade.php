@extends('layouts.frontend')
@section('title')
Dashboard
@stop
{{-- @section('css')
@endsection --}}
@section('content')
    <div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <a href="{{route('agents')}}">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-primary bg-darken-2">
                    <i class="font-large-2 white fa fa-user-o menu-icon"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>Agents</h5>
                    <h5 class="text-bold-400 mb-0">{{$agents->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <a href="{{route('leads')}}">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-danger bg-darken-2">
                    <i class="font-large-2 white fa fa-tty menu-icon"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-danger white media-body">
                    <h5>Leads</h5>
                    <h5 class="text-bold-400 mb-0">{{$leads->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <a href="{{route('students')}}">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-warning bg-darken-2">
                    <i class="font-large-2 white fa fa-user-o menu-icon"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-warning white media-body">
                    <h5>Students</h5>
                    <h5 class="text-bold-400 mb-0">{{$students->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <a href="{{route('contracts')}}">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-success bg-darken-2">
                    <i class="font-large-2 white fa fa-file menu-icon"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-success white media-body">
                    <h5>Contracts</h5>
                    <h5 class="text-bold-400 mb-0">{{$contracts->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
          </div>
    </div>
      
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                      <p><strong>Total Students</strong>
                        <span class="text-muted">{{'('.$students->count().')'}}</span>
                      </p>
                      <div class="progress progress-sm mt-1 mb-0">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{(($offer_letter->count()/$students->count())*100)}}%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="text-bold-500 mt-1 mb-0">Offer Letter Given: <strong>{{$offer_letter->count()}} Students</strong></h6>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                      <p><strong>Total Students</strong>
                        <span class="text-muted">{{'('.$students->count().')'}}</span>
                      </p>
                      <div class="progress progress-sm mt-1 mb-0">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{(($LOA->count()/$students->count())*100)}}%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="text-bold-500 mt-1 mb-0">L.O.A Received: <strong>{{$LOA->count()}} Students</strong></h6>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                      <p><strong>Total Students</strong>
                        <span class="text-muted">{{'('.$students->count().')'}}</span>
                      </p>
                      <div class="progress progress-sm mt-1 mb-0">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{(($visa_sub->count()/$students->count())*100)}}%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="text-bold-500 mt-1 mb-0">Visa Submission: <strong>{{$visa_sub->count()}} Students</strong></h6>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                      <p><strong>Total Students</strong>
                        <span class="text-muted">{{'('.$students->count().')'}}</span>
                      </p>
                      <div class="progress progress-sm mt-1 mb-0">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{(($refund->count()/$students->count())*100)}}%" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <h6 class="text-bold-500 mt-1 mb-0">Refund: <strong>{{$refund->count()}} Students</strong></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




    <div class="row">
      <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><strong>Agents</strong></h2>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="friends-activity" class="media-list ">
                  @if($agent_five->count()>0)
                  <?php $i=1; ?>
                  @foreach($agent_five as $agent)
                  <div class="media border-0">
                    <div class="media-left pr-1">
                      <strong>{{$i++."."}}</strong>
                    </div>
                    <div class="media-body w-100">
                      <h5 class="list-group-item-heading"><strong>{{$agent->name}}</strong>

                      </h5>
                      <p class="list-group-item-text mb-0">
                        <a href="{{route('studentList',['id'=>$agent->id])}}"><span class="btn btn-sm btn-info">Students</span></a>
                        <a href="{{route('summary',['id'=>$agent->id])}}"><span class="btn btn-sm btn-success">Summary</span></a>
                        <a href="{{route('agent.contracts',['id'=>$agent->id])}}"><span class="btn btn-sm btn-warning">Contracts</span></a>
                      </p>
                        <span class="font-small-2 float-right">{{$agent->created_at->toDateString()}}</span>
                      <hr>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
      </div>
      <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><strong>Leads</strong></h2>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="friends-activity" class="media-list">
                  @if($lead_ten->count()>0)
                  <?php $i=1; ?>
                  @foreach($lead_ten as $lead)
                  <div class="media border-0">
                    <div class="media-left pr-1">
                      <strong>{{$i++."."}}</strong>
                    </div>
                    <div class="media-body w-100">
                      <h5 class="list-group-item-heading"><strong>{{$lead->student_fname. " ". $lead->student_lname}}
                      @if($lead->status == 2)
                      <span class="success">{{'(Processed)'}}</span>
                      @endif
                      </strong>
                      </h5>
                      <p class="list-group-item-text mb-0">
                        
                      </p>
                      <span class="font-small-2 float-right">{{$lead->created_at->toDateString()}}</span>
                      <hr>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
      </div>
      <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><strong>Students</strong></h2>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div id="friends-activity" class="media-list">
                  @if($students_ten->count()>0)
                  <?php $i=1; ?>
                  @foreach($students_ten as $student)
                  <div class="media border-0">
                    <div class="media-left pr-1">
                      <strong>{{$i++."."}}</strong>
                    </div>
                    <div class="media-body w-100">
                      <h5 class="list-group-item-heading"><strong>{{$student->first_name. " ". $student->last_name}}
                      </strong>
                      </h5>
                      <p class="list-group-item-text mb-0">
                        
                      <a href="{{route('student.details',['id'=>$student->id])}}" class="btn btn-info btn-sm">View</a>
                      </p>
                      <span class="font-small-2 float-right">{{$student->created_at->toDateString()}}</span>
                      <hr>
                    </div>
                  </div>
                  @endforeach
                  @endif
                </div>
              </div>
            </div>
      </div>
    </div>
@endsection
{{-- @section('js')
@endsection --}}
{{-- <div class="container">
<div class="row">
    <div class="col-lg-4">
        <a href="{{route('agents')}}">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Total Agents</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$agents->count()}}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a href="{{route('students')}}" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Total Students</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$students->count()}}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a href="{{route('leads')}}" style="text-decoration: none;">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center">Total Leads</div>
                <div class="card-body bg-light text-dark">
                    <h3 class="card-title text-center">{{$leads->count()}}</h3>
                </div>
            </div>
        </a>
    </div>
</div>
</div> --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}


