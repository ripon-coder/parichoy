<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorCount extends Model
{
    protected $fillable = [ 'ip', 'date' ];
    protected $table = 'visitor_counts';
}
