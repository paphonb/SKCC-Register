<?php

namespace App\Judge;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function contests()
    {
        return $this->belongsToMany('App\Judge\Contest', 'contest_task', 'task_id', 'contest_id');
    }

    public static function lastSub(Task $task)
    {
        return Submission::where('task_id', $task->id)->orderBy('updated_at', 'desc')->first();
    }
}
