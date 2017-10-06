<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKOITeam extends Model
{
    protected $table = 'skoi_teams';

    public function students()
    {
        return $this->hasMany('App\SKOIStudent','team_id');
    }
}
