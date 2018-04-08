<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\operatorUsers;
use App\Models\OperatorAircraft;

class Operator extends Model
{
      protected $table = 'operators';

	protected $fillable = [
		
		'address',
		'telephone',
		'email',
		'logo',
		
		];

	public function jobs()
	{
		return $this->hasMany(Job::class);
	}

	public function Users()
	{
		return $this->hasMany(operatorUsers::class);
	}

	public function OperatorAircraft()
	{
		return $this->hasMany(OperatorAircraft::class);
	}
}
