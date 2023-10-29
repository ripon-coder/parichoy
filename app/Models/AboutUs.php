<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
        'profile_description',
        'phone',
        'phone_two',
        'phone_three',
        'phone_four',
        'phone_five',
        'email',
        'email_two',
        'email_three',
        'address',
        'embeded_link',
        'instra_link',
        'linkedin',
        'fb_link',
        'twitter_link',
        'youtube_link',
        'google_link',
        'dashboard_image',
        'header_logo',
        'favicon_icon',
        'footer_logo',
        'privacy_policy',
        'terms_of_use',
    ];
}
