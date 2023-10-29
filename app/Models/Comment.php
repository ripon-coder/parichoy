<?php

namespace App\Models;

use App\Models\Website\CommentReplay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
        'name',
        'email',
        'website',
        'is_active',
        'checkmark',
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function replies() {
        return $this->hasMany(CommentReplay::class);
    }

}
