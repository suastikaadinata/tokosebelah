<?php

namespace App\Http\Controllers\User;

use App\Poin;
use App\Voucher;
use App\Helper\HomeHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PoinController extends Controller
{
    public function poin()
    {
        $voucher = Voucher::orderBy('created_at', 'desc')->first();
        $voucerUser = Voucher::where('user_id', Auth::user()->id)->orWhereNull('user_id', Auth::user()->id)->get();
        return view('user.poin',[
            'voucher'       => $voucher,
            'voucherUser'   => $voucerUser
        ]);
    }

    public function tukarPoin(Request $request)
    {
        $voucher = Voucher::create($request->all());
        $poin = Poin::where('user_id', Auth::user()->id)->firstOrFail();
        $poin->poin -= $request->poin;
        $poin->save();
        
        $json = json_encode($poin);
        header('content-type:application/json');
        echo $json;
    }
}
