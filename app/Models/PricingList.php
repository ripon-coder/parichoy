<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingList extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'duration',
        'title',
        'slug',
        'content',
        'status',
    ];
}
