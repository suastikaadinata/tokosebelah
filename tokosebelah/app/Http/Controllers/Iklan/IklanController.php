<?php

namespace App\Http\Controllers\Iklan;

use App\User;
use App\Category;
use App\Kabupaten;
use App\Provinsi;
use App\Iklan;
use App\Foto;
use App\Feature;
use App\Belanja;
use App\Comment;
use App\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Helper\NotificationHelper;

class IklanController extends Controller
{
    public function add()
    {        
        $provinsi  = Provinsi::all();
        $kabupaten = json_encode(Kabupaten::all());
        
        return view('iklan.add', [
            'provinsi'      => $provinsi,
            'kabupaten'     => $kabupaten           
        ]);
    }

    public function save(Request $request)
    {
        $validation = [
            'judul'         => 'required|string|max:191',
            'kategori'      => 'required|exists:categories,id',
            'harga'         => 'required|numeric',
            'deskripsi'     => 'required|string',
            'features.*'    => 'nullable|string|max:191',
            'gambar.*'      => 'image|max:2000',
            'nomor_telepon' => 'required|string|max:191',
            'alamat'        => 'required|string|max:191',
            'provinsi'      => 'required|exists:provinsi,id',
            'kabupaten'     => 'required|exists:kabupaten,id'
        ];

        $this->validate($request, $validation);

        $user = Auth::user();
        $data = $request->all();

        $iklan = Iklan::create([
            'user_id'       => $user->id,
            'kategori_id'   => $data['kategori'],
            'judul'         => $data['judul'],
            'deskripsi'     => $data['deskripsi'],
            'harga'         => $data['harga'],
            'isVerified'    => 0,
            'nomor_telepon' => $data['nomor_telepon'],
            'alamat'        => $data['alamat'],
            'like'          => 0,
            'dislike'       => 0,
            'provinsi_id'   => $data['provinsi'],
            'kabupaten_id'  => $data['kabupaten'],
            'hapus'         => 0
        ]);

        if($request->hasFile('gambar')){
            $files = $request->file('gambar');
            foreach($files as $f){
                $path = $f->store('iklan', 'uploads');
                Foto::create([
                    'iklan_id'  => $iklan->id,
                    'foto'      => $path
                ]);
            }
        }
       
        $features = $request->input('features');
            foreach($features as $f){
            Feature::create([
                'iklan_id'  => $iklan->id,
                'fitur'     => $f
            ]);
        }
        
        return redirect('/iklan/tambah')->with('addIklan', ['tambah']);
    }

    public function detail($idKategori, $idIklan, $idNotif = null)
    {       
        if($idNotif != null){
            $notification = Notification::findOrFail($idNotif);
            $notification->read();
        }
        $iklanId = Iklan::findOrFail($idIklan);
        $iklan = Iklan::where('isVerified', 1)->where('kategori_id', $idKategori)->where('hapus', 0)->get();
        $comment = Comment::where('iklan_id', $idIklan)->get();
                               
        return view('iklan.detail-iklan', [           
            'iklanId'       => $iklanId,
            'iklan'         => $iklan,
            'comment'       => $comment       
        ]);
    }

    public function listByKategori($id)
    {
        $categoryId = Category::findOrFail($id);    
        $iklan =  Iklan::where('isVerified', 1)->where('kategori_id', $id)->where('hapus', 0)->get();
        
        return view('iklan.kategori',[            
            'categoryId'    => $categoryId,
            'iklan'         => $iklan           
        ]);
    }

    public function likeDislike(Request $request)
    {
        $iklan = Iklan::findOrFail($request->iklan_id);
        if($request->tipe == 1){
            if($iklan->dislike > 0){
                $iklan->dislike -= 1;
            }else{
                $iklan->dislike = 0;
            }
            
            $iklan->like += 1;
            
            if($iklan->user_id != Auth::user()->id){
                NotificationHelper::kirim('like', $iklan->user_id, $iklan);
            }
        }else{
            if($iklan->like > 0){
                $iklan->like -= 1;
            }else{
                $iklan->like = 0;
            }

            $iklan->dislike += 1;
            if($iklan->user_id != Auth::user()->id){
                NotificationHelper::kirim('dislike', $iklan->user_id, $iklan);
            }
        }

        $iklan->save();       
    }
}
