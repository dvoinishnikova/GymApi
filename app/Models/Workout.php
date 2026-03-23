<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Workout extends Model
{
    protected $fillable = [
        'user_id','trainer_id','date_time'
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
}