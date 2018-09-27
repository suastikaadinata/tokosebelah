<?php

namespace App\Http\Controllers;

use App\Iklan;
use App\Comment;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Helper\NotificationHelper;

class CommentController extends Controller
{
    public function add(Request $request)
    {   
        $iklan = Iklan::findOrFail($request->iklan_id);
        $comment = Comment::create($request->all());

        if($iklan->user_id != Auth::user()->id){
            NotificationHelper::kirim('comment', $iklan->user_id, $comment);
        }
    }
}
