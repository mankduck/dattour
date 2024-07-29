<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Account extends Authenticatable
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'email',
        'password',
        'role_id',
        'publish',
        'email_verification_token',
        'email_verified_at',
    ];

    protected $table = 'accounts';

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function guide()
    {
        return $this->hasOne(User::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function hasPermission($permissionCanonical)
    {
        return $this->role->permissions->contains('slug', $permissionCanonical);
    }

}
