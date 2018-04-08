<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Aircraft;

class Manufacturer extends Model
{
      protected $table = 'manufacturers';

	protected $fillable = [
		
		'name',
		
		];

	public function aircraft()
	{
		return $this->hasMany(Aircraft::class);
	}
}
