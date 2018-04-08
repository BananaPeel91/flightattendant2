@extends('layouts.app')

@section ('content')

    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 10px">
            <h1>Job id: {{ $job->id}}</h1>
            <h3> @foreach($job->jobRoutes as $route)
                    {{$route->airports->get(0)->name}} ({{$route->airports->get(0)->code}} ) - {{$route->airports->get(1)->name}} ({{$route->airports->get(1)->code}}) <br/>
                @endforeach
            </h3>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col" style="background-color: #fff;  padding-bottom: 10px;">
            <h2>Start Date: {{$job->start_date}} - End Date: {{$job->end_date}}
            <h3>Aircraft: {{$job->aircraft->name}}</h3>
            <a href="/operators/{{$job->operator->id}}"><h3>Operator: {{$job->operator->id}}</h3></a>
            <h3>Price: £{{$job->price}}</h3>

{{--  Check whether someone is logged in and make sure they are an attendant. also whether they have already applied--}}

            @if (auth()->check()&& auth::user()->user_role_id == 1)

                @if ($job->jobApplicants->contains('user_id', auth::User()->id))

                    <h4> You have already applied for this mission </h4>

                @else


                    <form method="POST" action="/jobs/apply">

                    {{csrf_field() }}

                    <input type="hidden" id="job_id" name="job_id" value="{{$job->id}}">

                    <button type="submit" class="btn btn-primary">Apply</button>

                    </form>
                @endif

                @else

                <h4> Please sign in to apply for this mission </h4>

               

            @endif
        </div>
    </div>
    
    @if($job->job_closed ==1)

       <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>This Job is Closed</h2>
            <hr>
        </div>   
    </div>   
        @foreach($job->jobApplicants as $applicant)
            @if(auth()->check() && $applicant->confirmationStatus->id == 3 && auth::User()->id == $applicant->user_id)
        <div class="row">
            <div class="col" style="background-color: #fff; margin-top: 20px">
                <h3>You have been booked for this misson</h3>
          </div>   
        </div>  
            @endif

        @endforeach

    @else
    
    
    <div class="row">
        <div class="col" style="background-color: #fff; margin-top: 20px">
            <h2>Applicants</h2>
            <hr>
        </div>   
    </div>



    <div class="row">
   
    
     @foreach($job->jobApplicants as $applicant)
        <div class="col-4" style="background-color: #fff; margin-top:10px; padding-bottom: 10px;">
            <a href="/users/{{$applicant->user->id}}"><h3>{{$applicant->user->name}}</h3></a>
            <h4>{{$applicant->confirmationStatus->status}}</h4>

            <form method="POST" action="/jobs/confirmation">

            <a href="/users/{{$applicant->user->id}}"><button class="btn btn-primary" style="background-color:#505050; border-color: #505050;" >View Applicant</button></a>

            

             {{csrf_field() }}

             <input type="hidden" class="form-control" id="applicant_id" name="applicant_id" value="{{$applicant->id}}">
             <input type="hidden" class="form-control" id="confirmation_status" name="confirmation_status_id" value="{{$applicant->confirmationStatus->id}}">

                @if(auth()->check()  && is_null($applicant->confirmation_status_id))

                @elseif(auth()->check() && $applicant->confirmationStatus->id == 1 && auth::user()->id == $applicant->user_id)
            
                @elseif(auth()->check() && $applicant->confirmationStatus->id == 1 && $operatorUser->operator_id == $job->operator_id)
                    <button type="submit" class="btn btn-primary">Request Confirmation </button>
                @elseif(auth()->check() && $applicant->confirmationStatus->id == 2 && auth::user()->id == $applicant->user_id)
                     <button type="submit" class="btn btn-primary">Confirm This Mission</button>
                @endif
            </form>
        </div>
    @endforeach
  
          
    </div>
    @endif

 

  

@endsection