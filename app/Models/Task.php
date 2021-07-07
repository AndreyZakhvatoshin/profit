<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const STATUS_CLOSE = 'close';

    public $timestamps = false;

    public $fillable = ['title', 'description', 'estimate', 'status'];
}
