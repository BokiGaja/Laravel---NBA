<?php

namespace App\Http\Controllers;

use App\News;
use App\Teams;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Eager loading
        $news = News::with('user')->paginate(10);
        return view('news.index', ['news' => $news]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $teamId = [];
        foreach ($news->newsTeams as $teamNews)
        {
            array_push($teamId, $teamNews->team_id);
        }
        $teams = Teams::findOrFail($teamId);
        return view('news.show', ['news' => $news, 'teams' => $teams]);
    }
}
