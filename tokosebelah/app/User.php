<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'deskripsi', 'foto', 'tipe', 'ttl'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->tipe == 'admin';
    }

    public function iklan()
    {
        return $this->hasMany(Iklan::class);
    }

    public function belanja()
    {
        return $this->hasMany(Belanja::class);
    }

    public function foto()
    {
        if($this->foto == null){
            return '/images/default-profile.png';
        }else{
            return '/images/' . $this->foto;
        }
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }
}
