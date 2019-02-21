<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTeams extends Model
{
    protected $fillable = [
        'news_id', 'team_id'
    ];
}
