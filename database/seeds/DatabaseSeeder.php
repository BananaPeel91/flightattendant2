<?php

use App\Models\Job;
use App\Models\Operator;
use App\Models\Manufacturer;
use App\Models\Aircraft;
use App\Models\OperatorAircraft;
use App\Models\JobRoutes;
use App\Models\JobApplicants;
use App\Models\ConfirmationStatus;
use App\Models\UserRoles;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		factory(ConfirmationStatus::class, 3)->create();

    		factory(Job::class, 20)->create()->each(function($job){

    			factory(JobRoutes::class, 2)->create(['job_id' => $job->id]);

    			factory(JobApplicants::class, 3)->create(['job_id' => $job->id]);
    		});

    	
    	
    }
}
