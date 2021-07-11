<?php

namespace App\Helpers;

use App\Models\Sprint;
use App\Models\SprintTask;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SprintHelper
{
    /**
     * создает массив данных для записи спринта
     * @param string $week
     * return array
     */
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

    /**
     * Проверяет оценку задачи в спринте
     * @param int $id
     * return bool
     */
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

    /**
     * Проверяет наличие активных спринтов
     * return bool
     */
    public static function hasActiveSprint(): bool
    {
        $sprints = Sprint::where('status', 'active')->get();
        return empty($sprints);
    }

    /**
     * Потверяет время начала спринта,
     * если спринт запускают за 7 дней и раньше - возвращает false
     * @param sprint_id
     * return bool
     */
    public static function checkSprintStart($id): bool
    {
        $sprint = Sprint::findOrFail($id);
        $date = new Carbon();
        if (($sprint->week - $date->weekOfYear > 1) || ($date->dayOfWeek < 2)) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет продолжительность всех задач в спринте.
     * Если количество часов превышает 40 возвращает false
     * @param sprint_id
     * return bool
     */
    public static function checkTaskDuration($id)
    {
        $tasks_id = SprintTask::select('task_id')->where('sprint_id', $id)->get();
        $tasks = Task::whereIn('id', $tasks_id)->get();
        $min = 0;
        $hours = 0;
        foreach ($tasks as $task) {
            if (preg_match('/h/', $task->estimate)) {
                $hoursCount = explode('h', $task->estimate);
                $hours += $hoursCount[0];
            }
            if (preg_match('/m/', $task->estimate)) {
                $minCount = explode('m', $task->estimate);
                $min += $minCount[0];
            }
        }
        return ($min / 60) + $hours <= 40 ? true : false;
    }

    /**
     * Проверяет наличие открытых задач в спринте.
     * @param int id
     * @return bool
     */
    public static function checkClosedTask($id): bool
    {
        $tasks_id = SprintTask::select('task_id')->where('sprint_id', $id)->get();
        $tasks = Task::whereIn('id', $tasks_id)->get();
        $messages = [];
        foreach ($tasks as $task) {
            if ($task->estimate !== Task::STATUS_CLOSE) {
                $messages[$task->id] = 'Задача не закрыта';
            }
        }
        return empty($messages);
    }
}
