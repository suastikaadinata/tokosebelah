<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
       'iklan_id', 'user_id', 'isi'
    ];
}
