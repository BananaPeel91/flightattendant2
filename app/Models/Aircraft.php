<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\Models\Manufacturer;
use App\Models\OperatorAircraft;

class Aircraft extends Model
{

	protected $table = 'aircrafts';

	protected $fillable = [
		'manufacturer_id',
		'name',
		'yom',
	];


      public function job()
    {
    	return $this->belongsTo(Job::class);
    }

     public function manufacturer()
    {
    	return $this->belongsTo(Manufacturer::class);
    }

    public function operatorAircraft()
    {
    	return $this->hasMany(OperatorAircraft::class);
    }

}
