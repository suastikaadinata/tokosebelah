<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanduanController extends Controller
{
    public function caraPembelian()
    {
        return view('panduan.cara-pembelian');
    }

    public function caraPembayaran()
    {
        return view('panduan.cara-pembayaran');
    }

    public function caraPasangIklan()
    {
        return view('panduan.cara-pasang-iklan');
    }
}
