<?php

namespace App\Helper;

use App\Pesan;
use App\User;
use Illuminate\Support\Facades\Auth;

class PesanHelper
{
    public static function getPesan($id)
    {
        $pesan = Pesan::findOrFail($id);
        return $pesan;
    }
}