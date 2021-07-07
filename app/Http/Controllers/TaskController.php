<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = Carbon::now();
        // $carbon->now()->weekOfYear();
        dd($carbon->weekOfYear);
        $task = Task::paginate(10);
        return response()->json(['data' => $task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        return response()->json(['data' => ['id' => 'TASK-' . $task->id]]);
    }

    public function taskEstimate(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json(['id' => $task->id, 'estimation' => $task->estimate]);
    }

    public function taskClose($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => Task::STATUS_CLOSE]);
        return response()->json(['taskId' => $task->id]);
    }
    public function show($id)
    {
        $task = Task::findOrFail($id);
        dd($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
