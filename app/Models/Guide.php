<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guide extends Model
{
    use HasApiTokens, HasFactory, Notifiable, QueryScopes;

    protected $fillable = [
        'name',
        'phone',
        'birthday',
        'image',
        'email',
        'description',
        'publish',
        'password',
    ];


    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class, 'guide_id');
    }

}
