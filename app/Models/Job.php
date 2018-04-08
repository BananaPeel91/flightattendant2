<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aircraft;
use App\Models\Operator;
use App\Models\JobApplicants;
use App\Models\JobRoutes;

class Job extends Model
{
    	protected $table = 'jobs';

	protected $fillable = [
		
		'aircraft_id',
		'operator_id',
		'start_date',
		'end_date',
		'price',
		'job_closed',

	];

	public function aircraft()
    {
    	return $this->belongsTo(Aircraft::class);
    }

    public function operator()
    {
    	return $this->belongsTo(Operator::class);
    }

    public function jobApplicants()
    {
    	return $this->hasMany(JobApplicants::class);
    }

    public function jobRoutes()
    {
    	return $this->hasMany(JobRoutes::class);
    }

  

    public static function filterJobs($request)
    {
        
         $jobs = static::all();

       
        $request = $request->all();

        

        foreach($request as $name => $value){
            
           if(!is_null($value) && $name!= '_token'){

            echo($value);

               $jobs = $jobs->where($name, $value);
           
               
            
        }
    }

         return $jobs;
    
    }
    


}
