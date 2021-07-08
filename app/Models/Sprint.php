<?php

namespace App\Models;

use App\Models\SprintTask;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = ['name', 'year', 'week', 'status'];

}
