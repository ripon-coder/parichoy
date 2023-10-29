<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeIntro extends Model
{
    use HasFactory;

    protected $fillable = [
		"image",
		"top_title",
		"main_title",
		"sub_title",
		"description",
		"instra_link",
		"fb_link",
		"twitter_link",
		"youtube_link",
		"google_link",
    ];
}
