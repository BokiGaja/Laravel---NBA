<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsTeams;
use App\Services\NewsService;
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
        $teams = NewsService::findTeams($news);
        return view('news.show', ['news' => $news, 'teams' => $teams]);
    }

    public function create()
    {
        $teams = Teams::all();
        return view('news.create', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $news = NewsService::newNews($request);
        NewsService::connectWithTeams($request, $news);
        session()->flash('message', 'Thank you for publishing article on www.nba.com');
        return redirect(route('show-news'));
    }
}
