<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintAndNews extends Model {
    use HasFactory;
    protected $fillable = ['printnewscategory_id','image', 'link'];
}
