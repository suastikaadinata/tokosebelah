<?php

namespace App\Helper;

use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class CommentHelper
{
    public static function getComment($id)
    {
        $comment = Comment::findOrFail($id);
        return $comment;
    }
}