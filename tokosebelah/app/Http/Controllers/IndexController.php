<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Iklan;
use App\Foto;
use App\Belanja;
use App\Helper\HomeHelper;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function layout()
    {
        $category = Category::all();
        return view('layout',[
            'category' => $category
        ]);
    }

    public function index()
    {
        $iklan = [];
        
        foreach(HomeHelper::getCategory() as $c) {
            array_push($iklan, Iklan::where('isVerified', 1)->where('kategori_id', $c->id)->where('hapus', 0)->get());
        }

        return view('home',[  
            'iklan'         => $iklan,           
        ]);
    }

    public function tentang()
    {
        return view('tentang-tokosebelah');
    }
}
