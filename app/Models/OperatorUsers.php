<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Operator;
use App\Models\User;

class OperatorUsers extends Model
{
     protected $table = 'operator_users';

	protected $fillable = [
		
		'operator_id',
		'user_id',
		
		];

	public function operator()
	{
		return $this->belongsTo(Operator::class);
	}

	public function User()
	{

	return $this->hasMany(User::class);
	}

	public static function getOperatorUsers($authUserId)
	{

		return static::where('user_id', $authUserId)->first();
	}
}
