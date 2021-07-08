<?php

namespace App\Http\Controllers;

use App\Helpers\SprintHelper;
use App\Http\Requests\SprintRequest;
use App\Models\Sprint;

class SprintController extends Controller
{
    public function store(SprintRequest $request)
    {
        $sprintData = SprintHelper::createSprintData($request->input('week'));
        $sprint = Sprint::create($sprintData);
        return response()->json(['year' => $sprint->year, 'week' => $sprint->week]);
    }

    public function start($id)
    {
        $errors = [];
        if (!SprintHelper::checkEstimateTask($id)) {
            $errors['Global'][] = ['Невозможно начать спринт. Оцените все задачи'];
        }
        if (SprintHelper::hasActiveSprint()) {
            $errors['Global'][] = ['Есть активный спринт'];
        }
        if (!SprintHelper::checkSprintStart($id)) {
            $errors['Global'][] = ['Еще рано начинать спринт'];
        }
        if (!SprintHelper::checkTaskDuration($id)) {
            $errors['Global'][] = ['Количество времени задач превышает 40 часов'];
        }
        if (!empty($errors)) {
            return response()->json(['Errors' => $errors]);
        }
        $sprint = Sprint::findOrFail($id);
        $sprint->update(['status' => 'active']);
        return response()->json(['sprintId' => $sprint->name]);
    }

    public function close($id)
    {
        if (!SprintHelper::checkClosedTask($id)) {
            return response()->json(['Errors' => ['Global' => 'Спринт содержит не закрытые задачи']]);
        }
        $sprint = Sprint::findOrFail($id);
        $sprint->update(['status' => 'close']);
        return response()->json(['sprintId' => $sprint->name]);
    }
}
