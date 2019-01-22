@extends("layouts.frontend")
@section('title')
Todos
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
    	<h3 class="content-header-title"><strong>Todos</strong> <span id="addtodo">
        @if($date != null)
					<button class="btn btn-sm btn-primary">Add</button>
        @endif
				</span>
      <span>
      <a href="{{route('pastWeekTodos')}}" class="btn btn-sm btn-success">Past Week Todos</a>
      </span>
    <span>
      <a href="{{route('pastMonthTodos')}}" class="btn btn-sm btn-danger">Past Month Todos</a>
      </span>
    </h3>
    </div>
	  <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
	    <div class="breadcrumb-wrapper col-12">
	      <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
	        </li>
	        <li class="breadcrumb-item">Todos
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
        		<div id="todo"></div>
                 <table class="table table-hover mb-0">
                    <thead>
                      <tr>
            <th id="date">{{$date}} 
              @if($date != null)
              <span id="editDate">
							<button class="btn btn-sm btn-primary">Edit</button><br>
							</span>
              @endif
               
                 
               </form>
						</th>
            @if($date==null)
            <th>Date</th>
            @endif
            <th>
							Time
						</th>
						<th>
							Activity
						</th>
						<th>
							Status
						</th>
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
                          @if($date==null)
                          <td class="text-truncate">{{$todo->date}}</td>
                          @endif
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
                            <span class="badge badge-default badge-danger">Missed</span>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                      @endif
                    </tbody>
                </table>
                </div>
              </div>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function(){
    $("#addtodo").click(function(){
      var name = '<form action="{{route('add.todo')}}" method="post">@csrf<input type="text" name="date" hidden value="{{$date}}"><table class="table table-hover mb-0"><thead><tr><th>Date</th><th>Time</th><th>Activity</th></tr></thead><tbody><td><input type="date" name="date" class="form-control" value="{{$date_today}}"></td><td><input type="time" name="time" class="form-control" value="{{$time}}"></td><td><input type="text" name="activity" class="form-control"></td></tbody></table><div class="text-center"><button class="btn btn-sm btn-success" type="submit">Save</button></div><br></form>';

      var disabled = '<button class="btn btn-sm btn-primary" disabled>Add</button>'
      $('#addtodo').html(disabled);
      $("#todo").append(name);  
      });
  });


  $(document).ready(function(){
    $("#editDate").click(function(){
      var temp = '<form action="{{route('todos')}}" method="post">@csrf<input type="text" name="datee" hidden value="{{$date}}"><input type="date" name="date"  style="border-radius: 20%" value="{{$date}}"> <button type="submit" class="btn btn-sm btn-success">Show</button></form>';
      $("#date").html(temp);  
      });
  });
</script>
@endsection

	
