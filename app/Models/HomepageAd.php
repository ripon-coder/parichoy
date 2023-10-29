<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageAd extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ad_1',
        'ad_2',
        'ad_3',
        'ad_4',
        'ad_5',
        'ad_6',
        'ad_7',
        'ad_8',
        'ad_9',
        'ad_10',
    ];
}
