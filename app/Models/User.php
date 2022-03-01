<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// This authenticates and verifies the user with role, email, and password.
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }

    public function authorizeRoles($roles) {
        if(is_array($roles)) {
            return $this->hasAnyRoles($roles) ||
            abort (401, 'This action is unauthorized');
        }
        return $this->hasRole($roles) ||
        abort(401, 'This action is unauthorized');
    }

    public function hasRole($role) {
        return null !== $this->roles()->where('name', $role)->first();
        }
    
    public function hasAnyRole($roles) {
        return null !== $this->roles()->where('name', $roles)->first();
        }
}
