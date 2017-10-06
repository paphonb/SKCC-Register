<?php

namespace App\Judge;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submissions';

    /**
     * Get owner of this submission
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function task()
    {
        return $this->belongsTo('App\Judge\Task');
    }
}
