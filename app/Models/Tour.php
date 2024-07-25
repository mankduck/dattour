<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory, QueryScopes;

    protected $fillable = [
        'name',
        'description',
        'image',
        'slug',
        'destination_id',
        'price',
        'category_id',
        'album',
        'link',
        'publish',
        'service',
        'code'
    ];

    protected $table = 'tours';

    protected $casts = [
        'album' => 'array',
        'service' => 'array'
    ];

    public function tour_category()
    {
        return $this->belongsTo(TourCategory::class, 'category_id', 'id');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'tour_service', 'tour_id', 'service_id');
    }

    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class, 'tour_id', 'id');
    }

    public function tour_dates()
    {
        return $this->hasMany(TourDate::class, 'tour_id', 'id');
    }




}
