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
      <div class="col-xl-8 col-lg-12">
        <div class="card">
          <div class="card-header border-0-bottom">
            <h4 class="card-title"><strong>Todo</strong><span id="addtodo"><button class="btn btn-sm btn-primary">Add</button></span></h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <li><strong>{{$date}}</strong></li>
              </ul>
            </div>
          </div>
          <div class="card-content">
            <div id="todo"></div>
            <div id="daily-activity" class="table-responsive height-350">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>
                    </th>
                    <th>Time</th>
                    <th>Activity</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($todos->count()>0)
                  @foreach($todos as $todo)
                    <tr>
                      <td class="text-truncate">
                        <form action="{{route('update.todo',['id'=>$todo->id])}}" method="post">
                          @csrf
                          @if($todo->status==1)
                          <button id="updateTodo" type="submit" class="btn btn-primary btn-sm" disabled><span class="fa fa-check"></span>
                          @else
                          <button id="updateTodo" type="submit" class="btn btn-danger btn-sm"><span class="fa fa-eye"></span>
                          @endif
                          </button>
                          
                        </form>
                      </td>
                      <td class="text-truncate">{{$todo->time}}</td>
                      <td class="text-truncate">{{$todo->activity}}</td>
                      <td class="text-truncate">
                        @if($todo->status == 0)
                        <span class="badge badge-default badge-info">Pending</span>
                        @elseif($todo->status == 1)
                        <span class="badge badge-default badge-success">Done</span>
                        @elseif($todo->status == 2)
                        <span class="badge badge-default badge-warning">Delayed</span>
                        @elseif($todo->status == 3)
                        <span class="badge badge-default badge-delete">Missed</span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            <form action="{{route('todos')}}" method="post">
              @csrf
              <div class="text-center">
                <input type="text" name="date" hidden value="{{$date}}">
                <button class="btn btn-sm btn-warning" style="margin-top: 7px">All Todos</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-12 border-right-blue-grey border-right-lighten-5 clearfix">
      <div class="card">
          <div class="card-content">
            <div class="card-body">
              <p>
                <strong>Total Leads</strong>
                <span class="text-muted">{{'('.$leads->count().')'}}</span>
              </p>
              <div class="progress progress-sm mt-1 mb-0">
                <div class="progress-bar bg-success" role="progressbar" style="width: 
                @if($leads->count()>0)
                {{(($interested_leads->count()/$leads->count())*100)}}%
                @else
                0%
                @endif" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h6 class="text-bold-500 mt-1 mb-0">Interested: <strong>{{$interested_leads->count()}} Leads</strong></h6>
            </div>
      
            <div class="card-body">
      
              <div class="progress progress-sm mt-1 mb-0">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 
                @if($leads->count()>0)
                {{(($not_interested_leads->count()/$leads->count())*100)}}%
                @else
                0%
                @endif" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
              </div>
                <h6 class="text-bold-500 mt-1 mb-0">Not-Interested: <strong>{{$not_interested_leads->count()}} leads</strong></h6>
            </div>
      
            <div class="card-body">
              <div class="progress progress-sm mt-1 mb-0">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 
                @if($leads->count()>0)
                {{(($follow_up_leads->count()/$leads->count())*100)}}%
                @else
                0%
                @endif" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100"></div>
              </div>
                <h6 class="text-bold-500 mt-1 mb-0">Follow-up: <strong>{{$follow_up_leads->count()}} leads</strong></h6>
            </div>
            <form action="{{route('lead.report')}}" method="post" >
              @csrf
              <div class="card-body">
                <div class="form-group" >
                <label for="interested">Interested</label>
                <input type="checkbox" name="interested[]" value="interested" checked>&nbsp;&nbsp;
                <label for="Not-interested">Not-Interested</label>
                <input type="checkbox" name="interested[]" value="Not-interested" checked>&nbsp;
                <label for="Follow-up">Follow-Up</label>
                <input type="checkbox" name="interested[]" value="Follow-up" checked>
                </div>
                <div class="text-center">
                  <span><button type="submit" class="btn btn-success btn-sm">Report</button></span>
                </div>
              </div>
            </form>
          </div>
        </div>

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
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{route('offer_letter.report')}}" class="btn btn-success btn-sm">Report</a></span>
                    </p>
                    <div class="progress progress-sm mt-1 mb-0">
                      <div class="progress-bar bg-success" role="progressbar" style="width: @if($students->count()>0)
                      {{(($offer_letter->count()/$students->count())*100)}}%
                      @else
                      0%
                      @endif" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h6 class="text-bold-500 mt-1 mb-0">Offer Letter Given: <strong>{{$offer_letter->count()}} Students</strong></h6>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                    <p><strong>Total Students</strong>
                      <span class="text-muted">{{'('.$students->count().')'}}</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{route('LOA.report')}}" class="btn btn-info btn-sm">Report</a></span>
                    </p>
                    <div class="progress progress-sm mt-1 mb-0">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 
                      @if($students->count()>0)
                      {{(($LOA->count()/$students->count())*100)}}%
                      @else
                      0%
                      @endif
                      " aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h6 class="text-bold-500 mt-1 mb-0">L.O.A Received: <strong>{{$LOA->count()}} Students</strong></h6>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                    <p><strong>Total Students</strong>
                      <span class="text-muted">{{'('.$students->count().')'}}</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{route('visa.report')}}" class="btn btn-warning btn-sm">Report</a></span>
                    </p>
                    <div class="progress progress-sm mt-1 mb-0">
                      <div class="progress-bar bg-warning" role="progressbar" style="width: @if($students->count()>0)
                      {{(($visa_sub->count()/$students->count())*100)}}%
                      @else
                      0%
                      @endif" aria-valuenow="25"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h6 class="text-bold-500 mt-1 mb-0">Visa Submission: <strong>{{$visa_sub->count()}} Students</strong></h6>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5 clearfix">
                    <p><strong>Total Students</strong>
                      <span class="text-muted">{{'('.$students->count().')'}}</span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="{{route('refund.report')}}" class="btn btn-danger btn-sm">Report</a></span>
                    </p>
                    <div class="progress progress-sm mt-1 mb-0">
                      <div class="progress-bar bg-danger" role="progressbar" style="width: @if($students->count()>0)
                      {{(($refund->count()/$students->count())*100)}}%
                      @else
                      0%
                      @endif" aria-valuenow="25"
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
            <h2 class="card-title"><strong>Application Fee</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ({{'$'.$application_fee}})</h2>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <a href="{{route('applicationFee.report')}}" class="btn btn-primary btn-sm">Report</a>
              </ul>
            </div>
          </div>
          <div class="card-content px-1">
            <div id="recent-buyers" class="media-list height-600 position-relative">
              <a href="#" class="media border-0">
                {{-- <div class="media-left pr-1">
                      <span class="avatar avatar-md avatar-online">
                        <img class="media-object rounded-circle" src="{{asset('app/images/user-placeholder.jpg')}}"
                        alt="Generic placeholder image">
                        <i></i>
                      </span>
                    </div> --}}
                <div class="media-body w-100">
                @if($application->count()>0)
                <?php $i =1;?>
                @foreach($application as $app)
                  <h4 class="list-group-item-heading"><strong>{{$i++."."}}  {{$app->first_name.' '.$app->last_name}}</strong>
                    <span class="font-medium-4 float-right pt-1">${{$app->application_fee}}</span>
                  </h4>
                  <p class="list-group-item-text mb-0">
                    @if($app->offer_letter == 'yes')
                    <span class="badge badge-success" style="border-radius: 50px">Offer Letter given </span>
                    @endif
                    @if($app->LOA == 'yes')
                    <span class="badge badge-info" style="border-radius: 50px">LOA Received</span>
                    @endif
                    @if($app->submission_to_visa == 'yes')
                    <span class="badge badge-warning" style="border-radius: 50px">Visa Submitted</span>
                    @endif
                    @if($app->refund == 'yes')
                    <span class="badge badge-danger" style="border-radius: 50px">Refund</span>
                    @endif
                  </p><br>
                @endforeach
                @endif
                </div>
                  
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header">
            <h2 class="card-title"><strong>Tuition Fee</strong><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ({{'$'.$tuition_fee}})</h2>
            <div class="heading-elements">
              <ul class="list-inline mb-0">
                <a href="{{route('tuitionFee.report')}}" class="btn btn-primary btn-sm">Report</a>
              </ul>
            </div>
          </div>
          <div class="card-content px-1">
            <div id="recent-buyers" class="media-list height-600 position-relative">
              <a href="#" class="media border-0">
                <div class="media-body w-100">
                @if($tuition->count()>0)
                <?php $i =1;?>
                @foreach($tuition as $tut)
                  <h4 class="list-group-item-heading"><strong>{{$i++."."}}  {{$tut->first_name.' '.$tut->last_name}}</strong>
                    <span class="font-medium-4 float-right pt-1">${{$tut->tuition_fee}}</span>
                  </h4>
                  <p class="list-group-item-text mb-0">
                    @if($tut->offer_letter == 'yes')
                    <span class="badge badge-success" style="border-radius: 50px">Offer Letter given </span>
                    @endif
                    @if($tut->LOA == 'yes')
                    <span class="badge badge-info" style="border-radius: 50px">LOA Received</span>
                    @endif
                    @if($tut->submission_to_visa == 'yes')
                    <span class="badge badge-warning" style="border-radius: 50px">Visa Submitted</span>
                    @endif
                    @if($tut->refund == 'yes')
                    <span class="badge badge-danger" style="border-radius: 50px">Refund</span>
                    @endif
                  </p><br>
                @endforeach
                @endif
                </div>
                  
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><strong>Agents ({{$agents->count()}})</strong></h2>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <a href="{{route('agent.report')}}" class="btn btn-primary btn-sm">Report</a>
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
    </div>

      
    
@endsection
@section('js')

  <script type="text/javascript">
  $(document).ready(function(){
    $("#addtodo").click(function(){
      var name = '<form action="{{route('add.todo')}}" method="post">@csrf<table class="table table-hover mb-0"><thead><tr><th>Date</th><th>Time</th><th>Activity</th></tr></thead><tbody><td><input type="date" name="date" class="form-control" value="{{$date}}"></td><td><input type="time" name="time" class="form-control" value="{{$time}}"></td><td><input type="text" name="activity" class="form-control"></td></tbody></table><div class="text-center"><button class="btn btn-sm btn-success" type="submit">Save</button></div><br></form>';

      var disabled = '<button class="btn btn-sm btn-primary" disabled>Add</button>'
      $('#addtodo').html(disabled);
      $("#todo").append(name);  
      });
  });

  // $(document).ready(function(){
  //   $("#update").click(function(){
  //   document.getElementById('updateTodo').click();
  //   });
  // }):

    function SomeDeleteRowFunction(btndel) {
    if (typeof(btndel) == "object") {
        $(btndel).closest('.row').remove();
    } else {
        return false;
    }
  }
  </script>

@endsection
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


