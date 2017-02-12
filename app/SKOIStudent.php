<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKOIStudent extends Model
{
    protected $table = 'skoi_students';

    public function team()
    {
        return $this->belongsTo('App\SKOITeam');
    }
}
