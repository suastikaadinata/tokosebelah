<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = [
        'user_id', 'pembayaran_id', 'nama', 'alamat_pengiriman', 'nomor_telepon', 'provinsi_id', 'kabupaten_id'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class);
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
