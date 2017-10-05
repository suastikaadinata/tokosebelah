<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $table = 'iklan';
    protected $fillable = [
        'kategori_id',
        'user_id',
        'judul',
        'deskripsi',
        'slug',
        'harga',
        'isVerified',
        'status',
        'nomor_telepon',
        'alamat',
        'provinsi_id',
        'kabupaten_id',
    ];
}
