<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $table = 'foto';
    protected $fillable = [
        'iklan_id',
        'foto'
    ];

    public function getFotoAttribute($value)
    {
        return '/images/' . $value;
    }
}
