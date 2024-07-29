<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'name',
        'description',
        'publish'
    ];


    public function account()
    {
        return $this->hasMany(Role::class, 'role_id', 'id');
    }


    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }

}
