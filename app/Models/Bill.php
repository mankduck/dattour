<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory, QueryScopes;


    protected $fillable = [
        'total',
        'total_chil',
        'total_adult',
        'discount',
        'description',
        'booking_id',
        'status',
    ];

    public function booking_detail()
    {
        return $this->belongsTo(BookingDetail::class);
    }
}
