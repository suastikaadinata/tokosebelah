<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Belanja;
use Illuminate\Support\Facades\Auth;

class AdminKategoriIklanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function kategoriIklan()
    {      
        return view('admin.kategori-iklan');
    }

    public function tambahKategori(Request $request)
    {
        $data = $request->all();
        
        $this->validate($request, [
            'kategori' => 'required|string|max:191'
        ]);

        $category = Category::create([
            'nama' => $data['kategori']
        ]);

        return redirect()->back();
    }

    public function hapusKategori($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();
        return redirect()->back();
    }
}
