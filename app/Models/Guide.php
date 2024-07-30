<?php

namespace App\Models;

use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Guide extends Model
{
    use HasApiTokens, HasFactory, Notifiable, QueryScopes, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'birthday',
        'image',
        'description',
        'account_id'
    ];


    public function booking_detail()
    {
        return $this->hasMany(BookingDetail::class, 'guide_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

}
