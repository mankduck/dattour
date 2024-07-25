<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory, QueryScopes;


    protected $fillable = [
        'name',
        'email',
        'description',
        'address',
        'phone',
        'tour_id',
        'guide_id',
        'total',
        'status',
        'tour_date',
        'adult',
        'children',
        'code'
    ];


    public function bill()
    {
        return $this->hasOne(Bill::class, 'booking_id', 'id');
    }

    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id', 'id');
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class, 'tour_id', 'id');
    }
}
