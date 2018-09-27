<?php

namespace App\Http\Controllers\Iklan;

use App\Provinsi;
use App\Kabupaten;
use App\Pengiriman;
use App\Voucher;
use App\Helper\HomeHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function dataPengiriman($nominal = null)
    {
        $provinsi  = Provinsi::all();
        $kabupaten = json_encode(Kabupaten::all());

        if($nominal != null){
            $voucher = Voucher::where('user_id', Auth::user()->id)->where('jumlah', $nominal)->firstOrFail();
            $voucher->pakai();
        }

        return view('iklan.belanja.data-pengiriman',[
            'provinsi'  => $provinsi,
            'kabupaten' => $kabupaten
        ]);
    }

    public function selesai(Request $request)
    {
        $modal = 0;

        $this->validate($request, [
            'penerima'      => 'required|string|max:191',
            'nomor_telepon' => 'required|string|max:191',
            'alamat'        => 'required|string|max:191',
            'provinsi'      => 'required|exists:provinsi,id',
            'kabupaten'     => 'required|exists:kabupaten,id'
        ]);

        $data = $request->all();    

        $pengiriman = Pengiriman::create([
            'user_id'           => Auth::user()->id,
            'nama'              => $data['penerima'], 
            'alamat_pengiriman' => $data['alamat'],
            'nomor_telepon'     => $data['nomor_telepon'],
            'provinsi_id'       => $data['provinsi'],
            'kabupaten_id'      => $data['kabupaten']
        ]);

        $voucher = Voucher::where('user_id', Auth::user()->id)->where('pakai', 1)->first();        
        $total_harga = HomeHelper::getTotalHarga('belanja');
       
        return view('iklan.belanja.detail-pengiriman', [
            'pengiriman'    => $pengiriman,
            'voucher'       => $voucher,
            'total_harga'   => $total_harga,
            'modal'         => $modal
        ]);
    }

    public function editData($id)
    {
        $provinsi  = Provinsi::all();
        $kabupaten = json_encode(Kabupaten::all());
        $pengiriman = Pengiriman::findOrFail($id);
        return view('iklan.belanja.edit-data-pengiriman',[
            'pengiriman'    => $pengiriman,
            'provinsi'      => $provinsi,
            'kabupaten'     => $kabupaten
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'penerima'      => 'required|string|max:191',
            'nomor_telepon' => 'required|string|max:191',
            'alamat'        => 'required|string|max:191',
            'provinsi'      => 'required|exists:provinsi,id',
            'kabupaten'     => 'required|exists:kabupaten,id'
        ]);

        $data = $request->all();    
        $pengiriman = Pengiriman::findOrFail($id);
        
        $pengiriman->nama               = $data['penerima']; 
        $pengiriman->alamat_pengiriman  = $data['alamat'];
        $pengiriman->nomor_telepon      = $data['nomor_telepon'];
        $pengiriman->provinsi_id        = $data['provinsi'];
        $pengiriman->kabupaten_id       = $data['kabupaten'];
        $pengiriman->save();

        return view('iklan.belanja.detail-pengiriman', [
            'pengiriman' => $pengiriman
        ]);
    }

}
