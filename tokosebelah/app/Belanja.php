<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Belanja extends Model
{
    protected $table = 'belanja';
    protected $fillable = [
        'user_id', 'iklan_id', 'jumlah', 'pesanan', 'status', 'isReceived'
    ];

    public function iklan()
    {
        return $this->belongsTo(Iklan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        $this->status = 1;
        $this->save();
    }

    public function pesanan()
    {
        $this->pesanan = 1;
        $this->save();
    }

    public function isReceived()
    {
        $this->isReceived = 1;
        $this->save();
    }
}
