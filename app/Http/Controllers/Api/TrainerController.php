<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Models\Workout;

class TrainerController extends Controller
{
    public function index()
    {
        return Trainer::all();
    }

    public function schedule($id)
    {
        return Workout::where('trainer_id', $id)
            ->where('date_time', '>=', now())
            ->pluck('date_time');
    }
}