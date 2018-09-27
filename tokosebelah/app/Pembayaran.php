<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = [
        'user_id', 'harga_awal', 'total_harga', 'foto_transaksi', 'isVerified', 'diskon', 'voucher'
    ];

    public function belanja()
    {
        return $this->hasMany(Belanja::class);
    }

    public function iklan()
    {
        return $this->hasOne(Iklan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        if($this->foto_transaksi == null){
            return '/images/gratis.jpg';
        }else{
            return '/images/' . $this->foto_transaksi;    
        }   
    }

    public function verified()
    {
        $this->isVerified = 1;
        $this->save();
    }
}
