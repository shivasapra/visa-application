@extends('layouts.frontend')

@section('content')

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content">
                <div class="row">
                  <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="primary">Total Agents</h5>
                        <h3 class="font-large-2 text-bold-200">3,261</h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="65" class="knob hide-value responsive angle-offset" data-angleOffset="40"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#00B5B8" data-knob-icon="icon-trophy">
                        <ul class="list-inline clearfix pt-1 mb-0">
                          <li class="border-right-grey border-right-lighten-2 pr-2">
                            <h2 class="grey darken-1 text-bold-400">65%</h2>
                            <span class="primary">
                              <span class="ft-arrow-up"></span> Completed</span>
                          </li>
                          <li class="pl-2">
                            <h2 class="grey darken-1 text-bold-400">35%</h2>
                            <span class="danger">
                              <span class="ft-arrow-down"></span> Remaining</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="danger">Distance</h5>
                        <h3 class="font-large-2 text-bold-200">7.6
                          <span class="font-medium-1 grey darken-1 text-bold-400">mile</span>
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="70" class="knob hide-value responsive angle-offset" data-angleOffset="0"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FF7588" data-knob-icon="icon-pointer">
                        <ul class="list-inline clearfix pt-1 mb-0">
                          <li>
                            <h2 class="grey darken-1 text-bold-400">10</h2>
                            <span class="danger">Miles Today's Target</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-6 col-md-12 border-right-blue-grey border-right-lighten-5">
                    <div class="my-1 text-center">
                      <div class="card-header mb-2 pt-0">
                        <h5 class="warning">Calories</h5>
                        <h3 class="font-large-2 text-bold-200">4,025
                          <span class="font-medium-1 grey darken-1 text-bold-400">kcal</span>
                        </h3>
                      </div>
                      <div class="card-content">
                        <input type="text" value="81" class="knob hide-value responsive angle-offset" data-angleOffset="20"
                        data-thickness=".15" data-linecap="round" data-width="130"
                        data-height="130" data-inputColor="#BABFC7" data-readOnly="true"
                        data-fgColor="#FFA87D" data-knob-icon="icon-energy">
                        <ul class="list-inline clearfix pt-1 mb-0">
                          <li>
                            <h2 class="grey darken-1 text-bold-400">5000</h2>
                            <span class="warning">kcla Today's Target</span>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection
{{-- <div class="container">
<div class="row">
    <div class="col-lg-4">
        <a href="{{route('agents')}}" style="text-decoration: none;">
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


