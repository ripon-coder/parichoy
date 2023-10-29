<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Post extends Model {
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'headline_post',
        'status',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function scopeFilter($query, $filters) {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year']) {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
