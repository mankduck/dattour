<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_id',
        'time',
    ];


    public function tours()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
