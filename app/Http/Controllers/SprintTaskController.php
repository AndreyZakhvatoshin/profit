<?php

namespace App\Http\Controllers;

use App\Http\Requests\SprintTaskRequest;
use App\Models\SprintTask;

class SprintTaskController extends Controller
{

    public function store(SprintTaskRequest $request)
    {
        $sprintTask = SprintTask::create($request->all());
        return response()->json(['sprint_id' => $sprintTask->sprint_id, 'task_id' => $sprintTask->task_id]);
    }

}
