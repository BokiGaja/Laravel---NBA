<?php
/**
 * Created by PhpStorm.
 * User: nemanjagajic
 * Date: 2/21/19
 * Time: 4:37 PM
 */

namespace App\Services;


use App\News;
use App\Teams;

class TeamsService
{
    public static function newsOfTeam($teamName)
    {
        $team = Teams::where('name', $teamName)->first();
        $newsId = [];
        foreach ($team->newsTeams as $teamNews)
        {
            array_push($newsId, $teamNews->news_id);
        }
        return News::where('id',$newsId)->get();
    }
}