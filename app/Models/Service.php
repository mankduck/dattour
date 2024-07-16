<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'name',
        'icon',
        'description',
        'image',
    ];
}