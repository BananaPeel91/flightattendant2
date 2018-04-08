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
use App\Models\operatorAircraft;

class OperatorController extends Controller
{
    
    public function index()
    {
    	$operators = Operator::all();

    	return view('operators.index', compact('operators'));
    }

    public function show(Operator $operator)
    {

    	$jobs = Job::where('operator_id', $operator->id)->get();

    	$airports = Airport::all();
   
        
        

      $operatorAircrafts = OperatorAircraft::with('aircraft')->where('operator_id', $operator->id)->get();

      

    	return view('operators.show', compact('operator', 'jobs', 'operatorAircrafts', 'airports'));
    	}
    
}
