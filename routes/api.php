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

Route::post('/tasks', [TaskController::class, 'store']); //title, description
Route::patch('/estimate/{task}', [TaskController::class, 'taskEstimate']); //estimate, task_id
Route::post('/tasks/{task}/close', [TaskController::class, 'taskClose']); //id task
Route::post('/sprint', [SprintController::class, 'store']); //week
Route::post('/sprint/task/add', [SprintTaskController::class, 'store']);
Route::post('/sprint/{sprint}/start', [SprintController::class, 'start']);
Route::post('/sprint/{sprint}/close', [SprintController::class, 'close']);
