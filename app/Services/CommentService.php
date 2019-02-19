<?php
/**
 * Created by PhpStorm.
 * User: nemanjagajic
 * Date: 2/19/19
 * Time: 12:26 PM
 */

namespace App\Services;


use App\Comment;
use App\Teams;

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
}