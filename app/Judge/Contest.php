<?php

namespace App\Judge;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contests';

    public function configs()
    {
        return $this->hasMany('App\Judge\ContestConfig');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Judge\Task', 'contest_task', 'contest_id', 'task_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'contest_user', 'contest_id', 'user_id');
    }

    public function submissions()
    {
        return $this->belongsToMany('App\Judge\Submission', 'contest_submission', 'contest_id', 'submission_id');
    }


}
