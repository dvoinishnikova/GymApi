<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\WorkoutController;
use App\Http\Controllers\Api\TrainerController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\GymController;
use App\Http\Controllers\Api\ProfileController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/trainers', [TrainerController::class, 'index']);
Route::get('/gym-load', [GymController::class, 'load']);
Route::get('/trainers/{id}/schedule', [TrainerController::class, 'schedule']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [ProfileController::class, 'me']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/workouts', [WorkoutController::class, 'index']);
    Route::post('/workouts', [WorkoutController::class, 'store']);
    Route::delete('/workouts/{id}', [WorkoutController::class, 'destroy']);

    Route::post('/pay', [PaymentController::class, 'createPaymentIntent']);
});