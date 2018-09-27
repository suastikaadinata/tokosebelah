<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
       'user_id', 'iklan_id', 'isi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function iklan()
    {
        return $this->belongsTo(Iklan::class);
    }
}
