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
        'nomor_telepon',
        'alamat',
        'like',
        'dislike',
        'provinsi_id',
        'kabupaten_id',
        'hapus'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foto()
    {
        return $this->hasMany(Foto::class);
    }

    public function gambarPertama()
    {
        return $this->hasOne(Foto::class);
    }

    public function feature()
    {
        return $this->hasMany(Feature::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(kabupaten::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Category::class);
    }

    public function verify()
    {
        $this->isVerified = 1;
        $this->save();
    }

    public function hapus()
    {
        $this->hapus = 1;
        $this->save();
    }
}
