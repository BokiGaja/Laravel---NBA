<?php

namespace App\Http\Controllers;

use App\Comment;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show(Teams $team)
    {
        return view('teams.show', ['team' => $team]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit(Teams $teams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teams $teams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teams $teams)
    {
        //
    }

    public static function addComment(Request $request, $id)
    {
        $request->validate([
            'content'=>'required|min:10'
        ]);

        $comment = Comment::create([
            'team_id' => $id,
            'user_id' => auth()->user()->id,
            'content' => $request->content
        ]);

//        if ($comment->post->user)
//        {
//            Mail::to($comment->post->user)->send(new CommentRecieved(
//                $comment->post, $comment
//            ));
//        }
        return redirect()->route('team-info', ['id' => $id]);
    }
}
