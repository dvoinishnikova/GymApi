<?php

namespace App\Http\Controllers\Api;

use App\Models\Workout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class WorkoutController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()
            ->workouts()
            ->with('trainer')
            ->get();
    }



    public function store(Request $request)
    {
        $user = $request->user();
        
        if (!$user->hasActiveSubscription()) {
            return response()->json([
                'message' => 'Потрібен активний абонемент'
            ], 403);
        }

        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'date_time' => 'required|date',
        ]);

        try {
            return Workout::create([
                'user_id' => $user->id,
                'trainer_id' => $request->trainer_id,
                'date_time' => $request->date_time
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Цей час вже зайнятий'
            ], 400);
        }
    }
    public function destroy($id, Request $request)
    {
        $workout = Workout::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$workout) {
            return response()->json([
                'message' => 'Тренування не знайдено'
            ], 404);
        }

        $workout->delete();

        return response()->json([
            'message' => 'Тренування видалено'
        ]);
    }
}
