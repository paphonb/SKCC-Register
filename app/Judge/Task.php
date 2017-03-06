<?php

namespace App\Judge;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public static function lastSub(Task $task)
    {
        return Submission::where('task_id', $task->id)->orderBy('updated_at', 'desc')->first();
    }
}
