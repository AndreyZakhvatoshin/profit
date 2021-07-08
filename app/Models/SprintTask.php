<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintTask extends Model
{
    use HasFactory;

    protected $table = 'sprint_task';
    public $timestamps = false;

    public $fillable = ['sprint_id', 'task_id'];
}
