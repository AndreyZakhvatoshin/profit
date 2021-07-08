<?php

namespace App\Helpers;

use App\Models\Sprint;
use App\Models\SprintTask;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SprintHelper
{
    public static function createSprintData(string $week): array
    {
        $carbon = Carbon::now();
        $yearSub = Str::substr($carbon->year, 2, 2);
        $sprintName = $yearSub . '-' . $week;
        return [
            'name' => $sprintName,
            'year' => (string) $carbon->year,
            'week' => $week,
        ];
    }

    public static function checkEstimateTask(int $id): bool
    {
        $tasks_id = SprintTask::select('task_id')->where('sprint_id', $id)->get();
        $tasks = Task::whereIn('id', $tasks_id)->get();
        $messages = [];
        foreach ($tasks as $task) {
            if (!$task->estimate) {
                $messages[$task->id] = 'Время выполнения не указано';
            }
        }
        return empty($messages);
    }

    public static function hasActiveSprint(): bool
    {
        $sprints = Sprint::where('status', 'active')->get();
        return empty($sprints);
    }
}
