<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_category_id',
        'title',
        'slug',
        'image',
        'description',
        'status'
    ];

    public function categories() {
        return $this->belongsTo(self::class, 'parent_category_id');
    }

    public function subCategories() {
        return $this->hasMany(self::class, 'parent_category_id')->where([['status', 1]])->with('categories');
    }
    
    public function posts() {
        return $this->belongsToMany(Post::class)->where('status', 1)->orderBy('id', 'DESC')->withTimestamps();
    }
}
