<?php

namespace App\Http\Controllers\Iklan;

use App\User;
use App\Iklan;
use App\Belanja;
use App\Category;
use App\Provinsi;
use App\Kabupaten;
use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BelanjaController extends Controller
{     
    public function belanja($id)
    {
        $belanja = Belanja::create([
            'user_id'       => Auth::user()->id,
            'iklan_id'      => $id,
            'jumlah'        => 1,
            'pesanan'       => 0,
            'status'        => 0,
            'isReceived'    => 0
        ]);

        return redirect()->back();
    }
    
    public function beliSekarang($id)
    {
        $belanja = Belanja::create([
            'user_id'       => Auth::user()->id,
            'iklan_id'      => $id,
            'jumlah'        => 1,
            'pesanan'       => 0,
            'status'        => 0,
            'isReceived'    => 0
        ]);

        $voucher = Voucher::where('user_id', Auth::user()->id)->get();
        return view('iklan.belanja.list-belanja', [
            'voucher'   => $voucher
        ]);
    }

    public function listBelanja()
    {   
        $voucher = Voucher::where('user_id', Auth::user()->id)->where('pakai', 0)->get();
        return view('iklan.belanja.list-belanja', [
            'voucher'   => $voucher
        ]);
    }

    public function delete($id)
    {
        $belanja = Belanja::findOrFail($id);
        $belanja->delete();
        return redirect()->back();
    }

    public function pembayaran()
    {        
        return view('iklan.belanja.pembayaran');
    }
}
