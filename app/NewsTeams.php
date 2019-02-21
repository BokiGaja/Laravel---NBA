<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTeams extends Model
{
    public function news()
    {
        return $this->belongsTo(News::class);
    }
    public function teams()
    {
        return $this->belongsTo(Teams::class);
    }
}
