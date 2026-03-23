<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name','type','experience_years','clients_count',
        'rating','description','phone','telegram','image'
    ];
    
}
