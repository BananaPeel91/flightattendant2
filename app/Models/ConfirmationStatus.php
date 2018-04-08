<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplicant;

class ConfirmationStatus extends Model
{
    	protected $table = 'confirmation_statuses';

	protected $fillable = [
		
		'status',
			];

	public function JobApplicant()
    {
    	return $this->hasMany(JobApplicant::class);
    }
}
