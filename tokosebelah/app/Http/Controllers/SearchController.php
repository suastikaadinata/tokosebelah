<?php

namespace App\Http\Controllers;

use App\Iklan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function search()
    {
        $keyword = Input::get('search');
        $search = Iklan::where('isVerified', 1)->where('hapus', 0)->where('judul', "LIKE", "%$keyword%")->paginate(20);

        return view('search',[
            'search'    => $search,
            'keyword'   => $keyword
        ]);
    }
}
