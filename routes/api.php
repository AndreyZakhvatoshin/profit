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

use App\Http\Controllers\SprintController;
use App\Http\Controllers\SprintTaskController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/tasks', TaskController::class);
Route::patch('/estimate/{task}', [TaskController::class, 'taskEstimate']);
Route::patch('/{task}/close', [TaskController::class, 'taskClose']);
Route::apiResource('/sprints', SprintController::class);
Route::post('/sprint/task/add', [SprintTaskController::class, 'store']);
Route::patch('/sprint/{sprint}/start', [SprintController::class, 'start']);
