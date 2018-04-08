<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\User;
use App\Models\ConfirmationStatus;

class JobApplicants extends Model
{
    	protected $table = 'job_applicants';

	protected $fillable = [
		
		'job_id',
		'user_id',
		'confirmation_status_id',
		];

	public function job()
	{
		return $this->belongsTo(Job::class);
	}

	public function User()
	{
		return $this->belongsTo(USer::class);
	}

	public function confirmationStatus()
	{
		return $this->belongsTo(ConfirmationStatus::class);
	}

	public static function findApplicantById($applicantId){

		return Static::where('id', $applicantId)->first();
	}
}
