<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function show($id)
    {
        $player = Player::find($id);
        return view('players.show', ['player' => $player]);
    }
}
