<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, QueryScopes, SoftDeletes;



    protected $fillable = [
        'id',
        'name',
        'description',
        'image',
        'slug',
        'content',
        'publish',
        'user_id',
        'deleted_at',
    ];

    protected $table = 'posts';

    protected function user()
    {
        return $this->belongsTo(User::class);
    }
}
