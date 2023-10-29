<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\SubscribeResetPasswordNotification;

class SubscribeUser extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'subscribe_users';

     protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = [
        'member_id',
        'fname',
        'mname',
        'lname',
        'slug',
        'phone',
        'yearOfBirth',
        'email',
        'password',
        'member_plan',
        'usa_address',
        'city',
        'state',
        'zipcode',
        'country',
        'bd_address',
        'bd_upazila',
        'facebook',
        'twitter',
        'other_social',
        'information',
        'profile_img',
        'status',
        'duration',
        'started_at',
    ];

    protected $casts = [
        'started_at' => 'date',
    ];


    public function sendPasswordResetNotification($token)
    {
        $this->notify( new SubscribeResetPasswordNotification($token));
    }

}
