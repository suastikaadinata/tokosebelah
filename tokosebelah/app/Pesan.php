<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $fillable = [
        'penerima_id', 'pengirim_id', 'jenis', 'isi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'pengirim_id');
    }
}
