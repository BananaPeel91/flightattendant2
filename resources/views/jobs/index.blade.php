@extends('layouts.app')

@section ('content')

    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 10px">
            <h1>Jobs</h1>
        </div>
    </div>

   <div class="row">
    <div class="col-3" >
    <div class="row">
    <div class="col" style="background-color: #fff; margin-top: 10px; margin-bottom: 10px;  padding-bottom: 5px;">
      <h3>Filter Results</h3>

        <form method="POST" action="/jobs">

        {{csrf_field() }}

        <div class="form-group">
            
                <select name="operator_id" id="operator_id" class="form-control">
                    <option value="">Choose an Operator </option>
                    @foreach($operators as $operator)
                       
                            <option value="{{$operator->id}}" {{ old('operator_id') == $operator->id ? 'selected' : '' }}>
                                {{$operator->id}}
                            </option>
                        
                         @endforeach
                </select>

            </div>

      <div class="form-group">
            
                <select name="aircraft_id" id="aircraft_id" class="form-control">
                    <option value="">Choose an Aircraft </option>
                    @foreach($aircrafts as $aircraft)
                       
                            <option value="{{$aircraft->id}}" {{ old('aircraft_id') == $aircraft->id ? 'selected' : '' }}>
                                {{$aircraft->name}}
                            </option>
                        
                         @endforeach
                </select>

            </div>
     
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input type="date" name="start_date" id="start_date">
        
    </div>

     <div class="form-group">
        <label for="end_date">End Date</label>
        <input type="date" name="end_date" id="end_date">
        
    </div>

    <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    </div>
    </div>
    </div>
    
    
    <div class="col-8 offset-md-1"  >
        @foreach($jobs as $job)
        <div class="row">
            <div class="col" style="background-color: #fff; margin-top: 10px; margin-bottom: 10px; padding-bottom: 5px;">
            <a href="/jobs/{{$job->id}}"><h3>Job id: {{$job->id}}</h3></a>
      
            <p><b>Start Date:</b> {{$job->start_date}}<br/>
            <b>End Date:</b> {{$job->end_date}}<br/>
                <b>Routing:</b> 
                @foreach($job->jobRoutes as $route)
                    <p><b>Depart</b> {{$route->airports->get(0)->name}} <b>To Arrive At</b> {{$route->airports->get(1)->name}}</p>
                @endforeach
            <p><b>Aircraft:</b> {{$job->aircraft->name}} <br/>
            <b>Price:</b> {{$job->price}}<br/>
            <a href="/operators/{{$job->operator->id}}"><b>Operator:</b> {{$job->operator->id}}</p></a>
    
            <a href="/jobs/{{$job->id}}"><button class="btn btn-primary">View Job</button></a>
            </div>
      </div>
      @endforeach

       

  </div>

@endsection