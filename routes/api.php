<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/movies/{movie}', [MovieController::class, 'show']);
Route::post('/movies', [MovieController::class, 'store']);
Route::put('/movies/{movie}', [MovieController::class, 'update']);
Route::delete('/movies/{movie}', [MovieController::class,
'destroy']);
Route::apiResource('movies', MovieController::class)->only(['index','show']);
Route::apiResource('movies', MovieController::class); // index, show, store, update, destroy
