<?php

namespace App\Http\Controllers\Admin;

use App\Iklan;
use App\Category;
use App\Belanja;
use App\Pesan;
use App\Helper\NotificationHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIklanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function listIklan()
    {     
        $iklan = Iklan::all();
        
        return view('admin.iklan.list-iklan', [           
            'iklan'     => $iklan            
        ]);
    }

    public function lihatIklan($id)
    {        
        $iklan = Iklan::findOrFail($id);
        
        return view('admin.iklan.lihat-iklan', [           
            'iklan'     => $iklan            
        ]);
    }

    public function verify($id)
    {
        $iklan = Iklan::findOrFail($id);
        $iklan->verify();

        $pesan = Pesan::create([
            'pengirim_id'   => Auth::user()->id,
            'penerima_id'   => $iklan->user->id,
            'jenis'         => 'verifikasi iklan',
            'isi'           => 'Iklan yang anda buat dengan judul '.$iklan->judul.', telah di verifikasi oleh admin 
            dan secara otomatis akan mulai dipasarkan di tokosebelah.com'
        ]);

        NotificationHelper::kirim('pesan', $iklan->user->id, $pesan);

        return redirect('/admin/list-iklan');
    }

    public function tolak($id)
    {
        $iklan = Iklan::findOrFail($id);
        $pesan = Pesan::create([
            'pengirim_id'   => Auth::user()->id,
            'penerima_id'   => $iklan->user->id,
            'jenis'         => 'tolak iklan',
            'isi'           => 'Iklan yang anda buat dengan judul '.$iklan->judul.', tidak memenuhi persyaratan sehingga ditolak.'
        ]);

        NotificationHelper::kirim('pesan', $iklan->user->id, $pesan);
        $iklan->delete();

        return redirect('/admin/list-iklan');
    }

    public function hapus($id)
    {
        $iklan = Iklan::findOrFail($id);

        if($iklan->hapus == 0){
            $pesan = Pesan::create([
                'pengirim_id'   => Auth::user()->id,
                'penerima_id'   => $iklan->user->id,
                'jenis'         => 'hapus iklan',
                'isi'           => 'Iklan yang anda buat dengan judul '.$iklan->judul.', telah dihapus oleh admin karena mengandung konten yang tidak sesuai dengan peraturan dari 
                tokosebelah.com.'
            ]);
    
            NotificationHelper::kirim('pesan', $iklan->user->id, $pesan);
        }
       
        $iklan->delete();
        return redirect('/admin/list-iklan');
    }
}

