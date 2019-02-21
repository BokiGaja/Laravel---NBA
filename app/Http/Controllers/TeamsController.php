<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Services\TeamsService;
use App\Teams;
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
            $comment = CommentService::createComment($request, $id);
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
        return view('news.team-news', [ 'news' => TeamsService::newsOfTeam($teamName)]);
    }
}
