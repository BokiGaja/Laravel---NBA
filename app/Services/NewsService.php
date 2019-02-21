<?php
/**
 * Created by PhpStorm.
 * User: nemanjagajic
 * Date: 2/21/19
 * Time: 4:46 PM
 */

namespace App\Services;


use App\News;
use App\NewsTeams;
use App\Teams;

class NewsService
{
    public static function findTeams($news)
    {
        $teamId = [];
        foreach ($news->newsTeams as $teamNews)
        {
            array_push($teamId, $teamNews->team_id);
        }
        return Teams::findOrFail($teamId);
    }

    public static function newNews($newsData)
    {
        $newsData->validate([
            'title' => 'required|min:5',
            'content' => 'required|max:200'
        ]);
        return News::create([
            'user_id' => auth()->user()->id,
            'title' => $newsData->title,
            'content' => $newsData->content
        ]);
    }

    public static function connectWithTeams($request, $news)
    {
        $teamsId = $request->input('team');
        foreach ($teamsId as $team) {
            NewsTeams::create([
                'news_id' => $news->id,
                'team_id' => $team
            ]);
        }
    }
}