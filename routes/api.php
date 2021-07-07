<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SprintController;

Route::apiResource('/tasks', TaskController::class);
Route::patch('/estimate/{task}', [TaskController::class, 'taskEstimate']);
Route::patch('/{task}/close', [TaskController::class, 'taskClose']);
Route::apiResource('/sprints', SprintController::class);
