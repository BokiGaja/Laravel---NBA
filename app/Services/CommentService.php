<?php
/**
 * Created by PhpStorm.
 * User: nemanjagajic
 * Date: 2/19/19
 * Time: 12:26 PM
 */

namespace App\Services;


use App\Comment;
use App\Mail\CommentReceived;
use App\Teams;
use Illuminate\Support\Facades\Mail;

class CommentService
{
    public static function commentValidate($postData)
    {
        $postData->validate([
            'content'=>'required|min:10'
        ]);

        $badWords = ['hate', 'idiot', 'stupid', 'idiots'];
        $split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $postData->content, -1, PREG_SPLIT_NO_EMPTY);

        foreach ($badWords as $badWord)
        {
            foreach ($split as $content)
            {
                if ($badWord === $content)
                {
                    return $badWord;
                }
            }
        }

        return true;
    }

    public static function createComment($commentData, $id)
    {
        return Comment::create([
            'team_id' => $id,
            'user_id' => auth()->user()->id,
            'content' => $commentData->content
        ]);
    }

    public static function sendMail(Teams $team, Comment $comment)
    {
        Mail::to($team->email)->send(new CommentReceived($team, $comment));
    }
}