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
use App\Team;

class NewsService
{
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

    public static function editNews($newsData)
    {
        $newsData->update(request()->validate([
            'title' => 'required|min:5',
            'content' => 'required'
        ]));
    }

    public static function flashMessage($message)
    {
        session()->flash('message', $message);
    }
}