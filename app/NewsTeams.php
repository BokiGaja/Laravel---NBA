<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTeams extends Model
{
    protected $fillable = [
        'news_id', 'team_id'
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
    public function teams()
    {
        return $this->belongsTo(Teams::class);
    }
}
