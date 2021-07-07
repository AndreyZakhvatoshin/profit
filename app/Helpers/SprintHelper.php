<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Str;

class SprintHelper
{
    public static function createSprintName(string $week): string
    {
        $carbon = Carbon::now();
        $converted = Str::substr($carbon->year, 2, 2);
        return $converted . '-' . $week;
    }
}