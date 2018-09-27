<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Belanja;
use App\Pembayaran;
use App\Pesan;
use App\Pengiriman;
use App\Voucher;
use App\Helper\NotificationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminVerifikasiPembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function veriPembayaran()
    {
        $pembayaran = Pembayaran::all();
        return view('admin.pembayaran.verifikasi-pembayaran',[
            'pembayaran' => $pembayaran
        ]);
    }

    public function detailPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.detail-pembayaran',[
            'pembayaran'    => $pembayaran
        ]);
    }

    public function daftarBelanja($id, $idUser)
    {
        $belanja = Belanja::where('user_id', $idUser)->where('status', 0)->get();
        $voucher = Voucher::where('user_id', $idUser)->where('pakai', 1)->first();
        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.daftar-belanja',[
            'pembayaran'    => $pembayaran,
            'belanja'       => $belanja,
            'voucher'       => $voucher
        ]);
    }

    public function verifikasi($idPembayaran, $idUser)
    {
        $pesan = Pesan::create([
            'pengirim_id' => Auth::user()->id,
            'penerima_id' => $idUser,
            'jenis' => 'pembayaran',
            'isi' => 'Pembayaran anda telah berhasil diproses, barang pembelian anda akan segera dikirimkan ke alamat anda dan estimasi lama pengiriman adalah 1-2 minggu.'
        ]);

        NotificationHelper::kirim('pesan', $idUser, $pesan);

        $belanja = Belanja::where('user_id', $idUser)->where('pesanan', 1)->where('status', 0)->get();
        foreach($belanja as $b){
            $b->status();
            $pesanBeli = Pesan::create([
                'pengirim_id' => Auth::user()->id,
                'penerima_id' => $b->iklan->user_id,
                'jenis' => 'pembelian barang',
                'isi' => $b->user->name.' telah membeli barang anda dengan judul iklan '.$b->iklan->judul.'.'
            ]);
            NotificationHelper::kirim('pesan', $b->iklan->user_id, $pesanBeli);            
        }

        $pembayaran = Pembayaran::findOrFail($idPembayaran);
        $pembayaran->verified();

        $pengiriman = Pengiriman::where('user_id', $idUser)->where('pembayaran_id', null)->orderBy('created_at', 'desc')->first();
        $pengiriman->pembayaran_id = $idPembayaran;
        $pengiriman->save();

        return redirect('/admin/verifikasi-pembayaran');
    }

    public function tolak($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pesan = Pesan::create([
            'pengirim_id' => Auth::user()->id,
            'penerima_id' => $pembayaran->user_id,
            'jenis' => 'tolak pembayaran',
            'isi' => 'Pembayaran anda tidak dapat diproses, karena data pada foto transaksi tidak sesuai dengan data pada sistem'
        ]);

        NotificationHelper::kirim('pesan', $pembayaran->user->id, $pesan);
        $pembayaran->delete();
        
        return redirect('/admin/verifikasi-pembayaran');
    }

    public function hapus($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();
        return redirect('/admin/verifikasi-pembayaran');
    }
}
