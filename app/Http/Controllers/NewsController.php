<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsTeams;
use App\Teams;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->paginate(10);
        $teams = Teams::all();
        return view('news.index', ['news' => $news, 'teams' => $teams]);
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

    public function create()
    {
        $teams = Teams::all();
        return view('news.create', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|min:5',
           'content' => 'required|max:200'
        ]);
        $news = News::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content' => $request->content
        ]);

        $teamsId = $request->input('team');
        foreach ($teamsId as $team) {
            NewsTeams::create([
                'news_id' => $news->id,
                'team_id' => $team
            ]);
        }

        session()->flash('message', 'Thank you for publishing article on www.nba.com');
        return redirect(route('show-news'));

    }
}
