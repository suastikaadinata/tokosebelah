<?php

namespace App\Http\Controllers\Iklan;

use App\belanja;
use App\Pengiriman;
use App\Voucher;
use App\Pembayaran;
use App\Helper\HomeHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function pesanan()
    {
        $nominal = 0;
        $pengiriman = Pengiriman::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('pesanan', 1)->where('status', 1)->where('isReceived', 0)->get();
        $voucher = Voucher::where('user_id', Auth::user()->id)->where('pakai', 1)->first();
        if($voucher != null){
            $nominal = $voucher->jumlah;
        }
        
        return view('iklan.belanja.pesanan',[
            'pengiriman'    => $pengiriman,
            'belanja'       => $belanja,
            'nominal'       => $nominal
        ]);
    }

    public function selesai(){      
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('isReceived', 1)->get();
        return view('iklan.belanja.pesanan-terkirim', [
            'belanja' => $belanja
        ]);
    }

    public function diterima(){
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('status', 1)->where('isReceived', 0)->get();
        foreach($belanja as $b){
            $b->isReceived();
        }

        $voucher = Voucher::where('user_id', Auth::user()->id)->where('pakai', 1)->first();
        if($voucher != null){
            $voucher->delete();
        }      

        return redirect()->back()->with('diterima', ['diterima']);
    }
}
