<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobRoutes;

class Airport extends Model
{
    	protected $table = 'airports';

	protected $fillable = [
		
		'name',
		'code',
	];

	   public function originRoute()
    {
    	return $this->belongsTo(JobRoutes::class, 'id', 'origin_id');
    }

      public function destinationRoute()
    {
    	return $this->belongsTo(JobRoutes::class, 'id', 'destination_id');
    }

}
