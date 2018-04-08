<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\UserRole;
use App\Models\OperatorUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userRoles()
    {
        return $this->belongsTo(UserRoles::class);
    }

    public function operatorUser()
    {
        return $this->belongsTo(OperatorUser::class);
    }

    public static function findUserById($userId)
    {
        return static::where('id', $userId);

    }
}
