<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'voucher';
    protected $fillable = [
        'user_id', 'tipe', 'poin', 'kode', 'jumlah', 'pakai'
    ];

    public function pakai()
    {
        $this->pakai = 1;
        $this->save();
    }
}
