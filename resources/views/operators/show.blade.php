@extends('layouts.app')

@section ('content')

    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 10px">
            <h1>Name: {{$operator->id}}</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col" style="background-color: #fff;  padding-bottom: 10px;">
            <h3>{{$operator->address}}</h3>
            
            <h3>Telephone: {{$operator->telephone}}</h3>
            <h3>Email: {{$operator->email}}</h3>

        </div>
    </div>
    
    
    
    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>Aircraft</h2>
            <hr>
        </div>   
    </div>


    @foreach($operatorAircrafts as $operatorAircraft)
    <div class="row">
        <div class="col" style="background-color: #fff;">
            <p>{{$operatorAircraft->aircraft->name}}</p>
            <p>Year of Manufacture: {{$operatorAircraft->aircraft->yom}}</p>
            <button class=" btn btn-primary">More Info</button>
            <hr>
        </div>   
    </div>
    @endforeach

@if(auth()->check() && $operator->users->contains('user_id', auth::User()->id))
    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>List a New Job</h2>
            <hr>
        </div>   
    </div>

     <div class="row">
        <div class="col" style="background-color: #fff;">
    

    
                        <form method="POST" action="/jobs/create">

                {{csrf_field() }}

                <input type="hidden" id="operator_id" name="operator_id" value="{{ $operator->id}}">




                <div class="form-group">
                <label for="aircraft_id">Choose Aircraft</label>
                    <select name="aircraft_id" id="aircraft_id" class="form-control" required>
                        <option value="">Choose One...</option>
                            @foreach ($operatorAircrafts as $operatorAircraft)
                                <option value="{{ $operatorAircraft->aircraft->id}}">
                                    {{$operatorAircraft->aircraft->name}}</option>
                            @endforeach
                    </select>
                </div>



                
                 

                  <div class="form-group">

                            <label for="value">Price:</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('value') }}" required>

                 </div>

                   <div class="form-group">

                            <label for="start_date">Start Date</label>
                            <input type="Date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>

                 </div>

                  <div class="form-group">

                            <label for="end_date">End Date</label>
                            <input type="Date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>

                 </div>

                  

                 <h3>Routing</h3>

                 <div class="form-group">
                    <label for="Origin">Origin:</label>
                      <select name="jobRoutes[1][origin_id]" id="origin_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                   <div class="form-group">
                    <label for="Destination">Destination:</label>
                      <select name="jobRoutes[1][destination_id]" id="destination_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                  <div class="form-group">
                  <label for="departure_date">Departure Date</label>
                     <input type="Date" class="form-control" id="departure_date" name="jobRoutes[1][departure_date]"  required>
                  </div>

                  <div class="form-group">
                  <label for="departure_date">Departure Time</label>
                     <input type="time" class="form-control" id="departure_time" name="jobRoutes[1][departure_time]" value="{{ old('close_date') }}" required>
                  </div>



                 <h3>Routing</h3>

                 <div class="form-group">
                    <label for="Origin">Origin:</label>
                      <select name="jobRoutes[2][origin_id]" id="origin_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                   <div class="form-group">
                    <label for="Destination">Destination:</label>
                      <select name="jobRoutes[2][destination_id]" id="destination_id" class="form-control" required>
                        <option value="">Choose One...</option>
                          @foreach ($airports as $airport)
                            <option value="{{ $airport->id}}">
                              {{ $airport->name }}</option>
                        @endforeach
                      </select>
                  </div>

                   <div class="form-group">
                  <label for="departure_date">Departure Date</label>
                     <input type="Date" class="form-control" id="departure_date" name="jobRoutes[2][departure_date]"  required>
                  </div>

                  <div class="form-group">
                  <label for="departure_date">Departure Time</label>
                     <input type="time" class="form-control" id="departure_time" name="jobRoutes[2][departure_time]" value="{{ old('close_date') }}" required>
                  </div>


                


                 <button type="submit" class="btn btn-primary">Create</button>


            </form>

    
        </div>
</div>

<div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>Closed Jobs</h2>
            <hr>
        </div>   
    </div>

    @foreach($jobs as $job)
    @if($job->job_closed == 1)
    <div class="row">
        <div class="col" style="background-color: #fff;">
            <p><a href="/jobs/{{$job->id}}">ID: {{$job->id}}</p></a>
            <p><b>Routing:</b><br/>@foreach($job->jobRoutes as $route)
                    {{$route->airports->get(0)->name}} ({{$route->airports->get(0)->code}} ) - {{$route->airports->get(1)->name}} ({{$route->airports->get(1)->code}}) <br/>
                @endforeach</h3>
            <p>Start Date: {{ $job->start_date }}</p>
            <p>Aircraft: {{ $job->aircraft->name }}</p>
            <p>Price: £{{$job->price}}</h3>
            <a href="/jobs/{{$job->id}}"><button class=" btn btn-primary"> View Job</button></a>
            <hr>
        </div>   
    </div>
    @endif
    @endforeach


@endif



    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>Current Listed Jobs</h2>
            <hr>
        </div>   
    </div>

    @foreach($jobs as $job)
    @if($job->job_closed == 0)
    <div class="row">
        <div class="col" style="background-color: #fff;">
            <p><a href="/jobs/{{$job->id}}">ID: {{$job->id}}</p></a>
            <p><b>Routing:</b><br/>@foreach($job->jobRoutes as $route)
                    {{$route->airports->get(0)->name}} ({{$route->airports->get(0)->code}} ) - {{$route->airports->get(1)->name}} ({{$route->airports->get(1)->code}}) <br/>
                @endforeach</h3>
            <p>Start Date: {{ $job->start_date }}</p>
            <p>Aircraft: {{ $job->aircraft->name }}</p>
            <p>Price: £{{$job->price}}</h3>
            <a href="/jobs/{{$job->id}}"><button class=" btn btn-primary"> View Job</button></a>
            <hr>
        </div>   
    </div>
    @endif
    @endforeach
 


 

  

@endsection