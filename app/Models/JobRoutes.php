<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\Airport;

class JobRoutes extends Model
{
    protected $table = 'job_routes';

	protected $fillable = [
		
		'job_id',
		'origin_id',
		'destination_id',
		'departure_date',
		'departure_time',
		];

	public function job()
	{
		return $this->belongsTo(Job::class);
	}

	public function airportsDestination()
	{

		return $this->hasMany(Airport::class, 'id', 'destination_id');

		
	}

	public function airportsOrigin()
	{

		return $this->hasMany(Airport::class, 'id', 'origin_id');

		
	}

	public function airports(){

		return $this->airportsOrigin()->union($this->airportsDestination()->toBase());

		
	}
}
