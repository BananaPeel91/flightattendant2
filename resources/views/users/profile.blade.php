@extends('layouts.app')

@section ('content')

    <div class="row" style="background-color: #fff; margin-top: 10px">
        <div style="margin-top: 10px;" class="col-10" >
        <img src="/images/{{ $user->image }}">
            <h1>{{ $user->name }}</h1>

            
        </div>
        @if(auth()->check() && auth::User()->id == $user->id)
        <div class="col-2 align-self-center">
           
            <a href="/users/{{$user->id}}/edit"><button style="margin-top: 5px; margin-left:35px;" class="btn btn-primary text-right">Edit My Profile</button></a>
           
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col" style="background-color: #fff;  padding-bottom: 10px;">
           
            <h3>{{ $user->email }}</h3>
        </div>
    </div>
    
@if($user->user_role_id == 1)   {{-- if the user is a flight attendant --}}


    
    @if(auth()->check() && auth()->user()->id == $user->id)
    <div class="row">
            <div class="col" style="background-color: #fff; margin-top: 20px">
                <form action="/users/{{ $user->id }}/upload" method="post" enctype="multipart/form-data">

                     {{csrf_field() }}


                    <label>Upload a profile image:</label>
                    <input type="file" name="image" id="image">
                    <input type="submit" value="Upload" name="submit">

                </form>
            </div>
    </div>

    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>Jobs Applied For</h2>
            <hr>
        </div>   
    </div>
    
     

        @foreach($jobApplications as $jobApplication)
        @if($jobApplication->job->job_closed == 0)
      <div class="row">  
        <div class="col" style="background-color: #fff;">
            <p><b>Routing:</b><br/>@foreach($jobApplication->job->jobRoutes as $route)
                    {{$route->airports->get(0)->name}} ({{$route->airports->get(0)->code}} ) - {{$route->airports->get(1)->name}} ({{$route->airports->get(1)->code}}) <br/>
                @endforeach</p>
            <p><b>Start Date:</b> {{ $jobApplication->job->start_date }}</p>
            <p><b>Aircraft:</b> {{ $jobApplication->job->aircraft->name }}</p>
            <p><b>Price:</b> {{ $jobApplication->job->price}} </p>
            {{-- Loop through job applicants and display the one that contains the current USer ID --}}
            <p><b>Status:</b>{{ $jobApplication->confirmationStatus->status }}</p>
            <a href="/jobs/{{ $jobApplication->job->id }}"><button class=" btn btn-primary"> View Job</button></a>
            <hr>
        </div>   
        </div>
        @endif
        @endforeach
    

       <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>Confirmed Jobs</h2>
            <hr>
        </div>   
    </div>

    @if($jobApplications->contains('confirmation_status_id', 3))
      @foreach($jobApplications as $jobApplication)
      @if($jobApplication->confirmation_status_id == 3)
      <div class="row">  
        <div class="col" style="background-color: #fff;">
            <p><b>Routing:</b><br/>@foreach($jobApplication->job->jobRoutes as $route)
                    {{$route->airports->get(0)->name}} ({{$route->airports->get(0)->code}} ) - {{$route->airports->get(1)->name}} ({{$route->airports->get(1)->code}}) <br/>
                @endforeach</p>
            <p><b>Start Date:</b> {{ $jobApplication->job->start_date }}</p>
            <p><b>Aircraft:</b> {{ $jobApplication->job->aircraft->name }}</p>
            <p><b>Price:</b> {{ $jobApplication->job->price}} </p>
            {{-- Loop through job applicants and display the one that contains the current USer ID --}}
            <p><b>Status:</b>{{ $jobApplication->confirmationStatus->status }}</p>
            <a href="/jobs/{{ $jobApplication->job->id }}"><button class=" btn btn-primary"> View Job</button></a>
            <hr>
        @endif

        </div>   
        </div>
        @endforeach
    @else
        <div class="row">  
        <div class="col" style="background-color: #fff;">
        <h3> You have no confirmed jobs </h3>
        </div>
        </div>
    @endif
    @endif

@elseif($user->user_role_id == 2) {{-- if the user is an operator user --}}
    @if(!is_null($operatorUser))
   <div class="row">
        <div class="col" style="background-color: #fff;  padding-bottom: 10px;">

    <a href="/operators/{{$operatorUser->operator->id}}"><h3>Operator: {{$operatorUser->operator->id}}</h3></a>

        </div>

    </div>
    @endif


    @if(auth()->check() && auth()->user()->id == $user->id && is_null($operatorUser))

    <div class="row">

        <div class="col" style="background-color: #fff;  padding-bottom: 10px;">
        <hr>
        <h3>Choose Your Operator</h3>

        <form method="POST" action="/chooseoperator">

        {{csrf_field() }}

         <div class="form-group">

                <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
            
                <select name="operator_id" id="operator_id" class="form-control">
                    <option value="">Choose an Operator </option>
                    @foreach($operators as $operator)
                       
                            <option value="{{$operator->id}}" {{ old('operator_id') == $operator->id ? 'selected' : '' }}>
                                {{$operator->id}}
                            </option>
                        
                         @endforeach
                </select>

            </div>

            <button class="btn btn-primary" type="submit">Confirm Operator</button>

        </form> 

        </br><h3>Create a New Operator</h3>

        <form method="POST" action="createoperator">
            {{csrf_field() }} 

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" id="telephone" name="telephone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <button class="btn btn-primary" type="submit">Create Operator</button>

        </form>
    @endif

  </div>
    </div>

   

@else

    this should not happen
@endif


    




 

  

@endsection