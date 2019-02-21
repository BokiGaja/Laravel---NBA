<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use App\NewsTeams;
use App\Services\CommentService;
use App\Teams;
use App\User;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Teams::all();
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(Teams $team)
    {
        return view('teams.show', ['team' => $team, 'badWord'=>'']);
    }

    public function addComment(Request $request, $id)
    {
        if (CommentService::commentValidate($request) === true)
        {
            $comment = Comment::create([
                'team_id' => $id,
                'user_id' => auth()->user()->id,
                'content' => $request->content
            ]);
            $team = Teams::find($id);
            CommentService::sendMail($team, $comment);
            return redirect()->route('team-info', [
                'id' => $id,
                'badWord'=>''
            ]);
        }

        return view('teams.show', [
            'team' => Teams::find($id),
            'badWord' => CommentService::commentValidate($request)
            ]);

    }

    public function teamNews($teamName)
    {
        $team = Teams::where('name', $teamName)->first();
        $newsId = [];
        foreach ($team->newsTeams as $teamNews)
        {
            array_push($newsId, $teamNews->news_id);
        }
        $news = News::where('id',$newsId)->get();
        return view('news.team-news', [ 'news' => $news]);
    }
}
