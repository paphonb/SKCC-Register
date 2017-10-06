<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKITStudent extends Model
{
    protected $table = 'skit_students';

    public function team()
    {
        return $this->belongsTo('App\SKITTeam');
    }
}
