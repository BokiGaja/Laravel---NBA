<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function players()
    {
        return $this->hasMany(Player::class, 'team_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'team_id');
    }

    public function newsTeams()
    {
        return $this->hasMany(NewsTeams::class, 'team_id');
    }
}
