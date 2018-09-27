<?php

namespace App\Http\Controllers;

use App\Pesan;
use App\Pengiriman;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function read($idPesan, $idNotif)
    {
        $harga_awal = 0;
        $notification = Notification::findOrFail($idNotif);

        $notification->read();

        $pengiriman = Pengiriman::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if($pengiriman != null){
            if($pengiriman->pembayaran_id != null){
                $harga_awal = $pengiriman->pembayaran->harga_awal;
            }
        }

        $pesan = Pesan::findOrFail($idPesan);
        return view('pesan.pesan', [
            'pesan'         => $pesan,
            'pengiriman'    => $pengiriman,
            'harga_awal'    => $harga_awal
        ]);
    }
}
