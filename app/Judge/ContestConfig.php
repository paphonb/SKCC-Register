<?php

namespace App\Judge;

use Illuminate\Database\Eloquent\Model;

class ContestConfig extends Model
{
    protected $table = 'contest_config';

    public function contest()
    {
        return $this->belongsTo('App\Judge\Contest');
    }
}
