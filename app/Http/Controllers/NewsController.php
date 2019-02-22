<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsTeams;
use App\Services\NewsService;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with('user')->orderBy('id', 'DESC')->paginate(10);
        $teams = Team::all();
        return view('news.index', ['news' => $news, 'teams' => $teams]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', ['news' => $news, 'teams' => $news->teams]);
    }

    public function create()
    {
        $teams = Team::all();
        return view('news.create', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $news = NewsService::newNews($request);
        $news->teams()->attach(\request('team'));
        NewsService::flashMessage('Thank you for publishing article on www.nba.com');
        return redirect(route('show-news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(News $news)
    {
        NewsService::editNews($news);
        NewsService::flashMessage('Your news has been updated');
        return redirect('/news/'.$news->id);
    }

    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        NewsService::flashMessage('Your news has been deleted');
        return redirect(route('show-news'));
    }
}
