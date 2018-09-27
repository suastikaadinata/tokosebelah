<?php

namespace App\Helper;

use App\User;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationHelper
{
    public static function kirim($type, $tujuan, $id)
    {
        $msg = [//1
            'user_id' => $tujuan,//1
            'read' => 0//1
        ];//1

        if($type == 'pesan'){//2
            $msg['pesan_id'] = $id->id;//3
        }else if($type == 'comment'){//4
            $msg['comment_id'] = $id->id;//5
        }else if($type == 'like'){//6
            $msg['iklan_id'] = $id->id;//7
            $msg['like_dislike'] = 1;//7
        }else{//untuk type == disklike /8
            $msg['iklan_id'] = $id->id;//8
            $msg['like_dislike'] = 0;//8
        }//8

        Notification::create($msg);//9
    }

    public static function getNotification()
    {
        $notification = Notification::where('user_id', Auth::user()->id)->where('read', 0)->get();
        return $notification;
    }
}
