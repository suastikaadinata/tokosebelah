<?php

namespace App\Http\Controllers\Iklan;

use App\Belanja;
use App\Pembayaran;
use App\Poin;
use App\Pengiriman;
use App\Voucher;
use App\Helper\HomeHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function bayar()
    {
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('pesanan', 0)->get();
        foreach($belanja as $b){
            $b->pesanan();
        }
       
        return view('iklan.belanja.pembayaran');
    }

    public function upload(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $jumlah = 0;

        $this->validate($request, [
            'gambar-trf' => 'image|max:2000'
        ]);

        if($request->hasFile('gambar-trf')){
            $files = $request->file('gambar-trf');
            $path = $files->store('pembayaran','uploads');
        }

        $voucher = Voucher::where('user_id', $user->id)->where('pakai', 1)->first();
        if($voucher != null){
            $jumlah = $voucher->jumlah;
        }

        $pembayaran = Pembayaran::create([
            'user_id'           => $user->id,
            'harga_awal'        => HomeHelper::getHargaAwal('status'),
            'total_harga'       => HomeHelper::getTotalHarga('status'),
            'foto_transaksi'    => $path,
            'isVerified'        => 0,
            'diskon'            => HomeHelper::getDiskon('status'), 
            'voucher'           => $jumlah           
        ]);

        $poin = Poin::where('user_id', Auth::user()->id)->first();            
        $poin->poin += HomeHelper::getPoin();
        $poin->save();
     
        return redirect()->back()->with('uploadPembayaran', ['tambah']);
    }

    public function gratis()
    {
        $jumlah = 0;
        $modal = 1;

        $belanja = Belanja::where('user_id', Auth::user()->id)->where('pesanan', 0)->get();
        foreach($belanja as $b){
            $b->pesanan();
        }

        $voucher = Voucher::where('user_id', Auth::user()->id)->where('pakai', 1)->first();
        if($voucher != null){
            $jumlah = $voucher->jumlah;
        }

        $pembayaran = Pembayaran::create([
            'user_id'           => Auth::user()->id,
            'harga_awal'        => HomeHelper::getHargaAwal('status'),
            'total_harga'       => HomeHelper::getTotalHarga('status'),
            'isVerified'        => 0,
            'diskon'            => HomeHelper::getDiskon('status'), 
            'voucher'           => $jumlah           
        ]);

        $poin = Poin::where('user_id', Auth::user()->id)->first();            
        $poin->poin += HomeHelper::getPoin();
        $poin->save();
     
        $pengiriman = Pengiriman::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();  
        $total_harga = HomeHelper::getTotalHarga('status');
       
        return view('iklan.belanja.detail-pengiriman', [
            'pengiriman'    => $pengiriman,
            'voucher'       => $voucher,
            'total_harga'   => $total_harga,
            'modal'         => $modal
        ]);
    }
}
