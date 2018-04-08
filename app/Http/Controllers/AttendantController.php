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

class AttendantController extends Controller
{
    
    public function index()
    {
        $attendants = User::where('user_role_id', 1)->get();

        return view('attendants.index', compact('attendants'));

    }

    
    
}
