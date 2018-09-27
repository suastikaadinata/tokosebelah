<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    protected $table = 'poin';
    protected $fillable = [
        'user_id', 'poin'
    ];
}
