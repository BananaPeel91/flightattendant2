<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Operator;
use App\Models\Aircraft;

class OperatorAircraft extends Model
{
     protected $table = 'operator_aircrafts';

	protected $fillable = [
		
		'operator_id',
		'aircraft_id',
		
		];

		public function operator()
		{
			return $this->belongsTo(Operator::class);
		}

		public function aircraft()
		{
			return $this->belongsTo(Aircraft::class);
		}
}
