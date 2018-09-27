<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $fillable = [
        'user_id', 'comment_id', 'pesan_id', 'iklan_id', 'like_dislike', 'read'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pesan()
    {
        return $this->hasOne(Pesan::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function iklan()
    {
        return $this->belongsTo(Iklan::class);
    }

    public function read()
    {
        $this->read = 1;
        $this->save();
    }
}
