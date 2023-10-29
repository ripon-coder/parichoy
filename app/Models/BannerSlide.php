<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerSlide extends Model
{
    use HasFactory;
    protected $guarded;

    public static function bannerQuery($banner){
        return self::where($banner, 1)->orderBy('id', 'DESC')->get();
    }
}
