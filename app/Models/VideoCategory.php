<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    use HasFactory;
    protected $fillable = ['slug','title','description','status'];
    public function video(){
        return $this->hasMany(Video::class,'video_categories_id','id');
    }
}
