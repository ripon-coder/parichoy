<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment_id',
        'name',
        'email',
        'website',
        'is_active',
        'checkmark',
    ];
}
