<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'name',
        'image',
        'publish',
        'slug'
    ];

    protected $table = 'tour_categories';

    public function tours()
    {
        return $this->hasMany(Tour::class, 'category_id');
    }


}
