<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id', 'team_id', 'content'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function team()
    {
        $this->belongsTo(Team::class);
    }
}
