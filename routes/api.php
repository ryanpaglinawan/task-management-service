<?php

use App\Http\Controllers\API\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/add-task', [TaskController::class, 'add']);
Route::get('/edit-task/{id}', [TaskController::class, 'edit']);
Route::put('/update-task/{id}', [TaskController::class, 'update']);
Route::delete('/delete-task/{id}', [TaskController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
