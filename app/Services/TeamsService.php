<?php
/**
 * Created by PhpStorm.
 * User: nemanjagajic
 * Date: 2/21/19
 * Time: 4:37 PM
 */

namespace App\Services;


use App\News;
use App\Team;

class TeamsService
{
    public static function newsOfTeam($teamName)
    {
        $team = Team::with('news')->where('name', $teamName)->first();
        return $team->news;
    }
}