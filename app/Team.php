<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
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

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_teams', 'team_id');
    }
}
