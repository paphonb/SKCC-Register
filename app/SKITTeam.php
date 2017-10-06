<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SKITTeam extends Model
{
    protected $table = 'skit_teams';

    public function students()
    {
        return $this->hasMany('App\SKITStudent','team_id');
    }
}
