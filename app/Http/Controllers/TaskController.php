<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json(['id' => 'TASK-' . $task->id]);
    }

    public function taskEstimate(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());//estimate
        return response()->json(['id' => $task->id, 'estimation' => $task->estimate]);
    }

    public function taskClose($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => Task::STATUS_CLOSE]);
        return response()->json(['taskId' => $task->id]);
    }
}
