<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\TeamsService;
use App\Team;
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
        $teams = Team::all();
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', ['team' => $team, 'badWord'=>'']);
    }

    public function addComment(Request $request, $id)
    {
        if (CommentService::commentValidate($request) === true)
        {
            $comment = CommentService::createComment($request, $id);
            $team = Team::find($id);
            CommentService::sendMail($team, $comment);
            return redirect()->route('team-info', [
                'id' => $id,
                'badWord'=>''
            ]);
        }

        return view('teams.show', [
            'team' => Team::find($id),
            'badWord' => CommentService::commentValidate($request)
            ]);
    }

    public function teamNews($teamName)
    {
        return view('news.team-news', [ 'news' => TeamsService::newsOfTeam($teamName)]);
    }
}
