<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserRoles extends Model
{
    protected $table = 'user_roles';

	protected $fillable = [
		
		
		'role'
		
		];
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
