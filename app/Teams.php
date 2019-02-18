<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    public function players()
    {
        return $this->hasMany(Player::class, 'team_id');
    }
}
