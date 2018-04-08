<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Job;
use App\Models\Operator;
use App\Models\Airport;
use App\Models\JobApplicants;
use App\Models\User;
use App\Models\JobRoutes;
use App\Models\Aircraft;
use App\Models\ConfirmationStatus;
use Illuminate\Http\Request;
use App\Models\operatorUsers;

class jobController extends Controller
{
    
    public function index(Request $request)
    {

    	$operators = Operator::all();

    	$aircrafts = Aircraft::all();

    	
        $jobs = Job::filterJobs($request);
         	
           
    	return view('jobs.index', compact('jobs', 'operators', 'aircrafts'));
    }

    public function show(Job $job)
    {
        if(auth()->check()){

    	$operatorUser = operatorUsers::getOperatorUsers(auth::User()->id);

    	return view('jobs.show', compact('job', 'operatorUser'));

    }
        else {

            return view('jobs.show', compact('job'));
        }



    }

    public function confirmation(Request $request)
    {

    	$applicant = JobApplicants::findApplicantById(request('applicant_id'));

    	if(request('confirmation_status_id') == 1){
    		$applicant->update(['confirmation_status_id' => 2]);

    		return redirect('/jobs/' . $applicant->job_id);
    	}
    	else if(request('confirmation_status_id') == 2){
    		$applicant->update(['confirmation_status_id' => 3]);

            $job = Job::where('id', $applicant->job->id);
            $job->update(['job_closed' => 1]);

    		return redirect('/jobs/' . $applicant->job_id);
    	}
    }

    public function apply(Request $request)
    {
        $operatorUser = operatorUsers::getOperatorUsers(auth::User()->id);

    	$apply = JobApplicants::create([

                'job_id' => request('job_id'),   
                'user_id' => Auth::User()->id, 
                'confirmation_status_id' => 1,
            ]);

    	return redirect('/jobs/' . $request->job_id);

    }

    public function create()
    {

        if(auth()->check()){

        $airports = airport::all();
        $aircrafts = aircraft::all();
        $operatorUser = operatorUsers::getOperatorUsers(auth::User()->id);

        return view('jobs.create', compact('aircrafts', 'airports', 'operatorUser'));

    }else{
       

        return view('jobs.create', compact('aircrafts', 'airports'));
    }
    }

    public function store(Request $request)
    {

        $this->validate($request, [
                'aircraft_id' => 'required',
                'price' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'operator_id' => 'required'
                ]);
        $job = Job::create([
                'aircraft_id' => request('aircraft_id'),
                'price' => request('price'),
                'start_date' => request('start_date'),
                'end_date' => request('end_date'),
                'operator_id' => request('operator_id'),
                'job_closed' => 0,


            ]);
       

      

            

        foreach(request('jobRoutes') as $routing)
            
            {
        

          $route = jobRoutes::create([
                
                'job_id' => $job->id,
                'origin_id' => $routing['origin_id'],
                'destination_id' => $routing['destination_id'],
                'departure_date' => $routing['departure_date'],
                'departure_time' => $routing['departure_time'],


            ]);


      
  }

  return redirect('/jobs/' . $job->id);
  }
}
