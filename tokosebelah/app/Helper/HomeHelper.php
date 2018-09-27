<?php

namespace App\Helper;

use App\Notification;
use App\User;
use App\Category;
use App\Belanja;
use App\Iklan;
use App\Poin;
use App\Voucher;
use Illuminate\Support\Facades\Auth;

class HomeHelper
{
    private $diskon;
    public static function getCategory()
    {
        $category = Category::all();
        return $category;
    }    

    public static function getBelanja()
    {
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('pesanan', 0)->get();
        return $belanja;
    }

    public static function getBelanjaStatus()
    {
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('status', 0)->get();
        return $belanja;
    }

    public static function getBelanjaPesanan()
    {
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('pesanan', 1)->where('status', 0)->get();
        return $belanja;
    }

    public static function getBelanjaKirim()
    {
        $belanja = Belanja::where('user_id', Auth::user()->id)->where('pesanan', 1)->where('isReceived', 0)->get();
        return $belanja;
    }

    private static function hitungTotalHarga($tipe){
        $total_harga = 0; 
        if($tipe == 'belanja'){
            $belanja = HomeHelper::getBelanja();
        }else if($tipe == 'status'){
            $belanja = HomeHelper::getBelanjaStatus();
        }else if($tipe == 'pesanan'){
            $belanja = HomeHelper::getBelanjaPesanan();
        }else if($tipe == 'kirim'){
            $belanja = HomeHelper::getBelanjaKirim();
        }

        if(Auth::user()){          
            if(count($belanja)>0){
                foreach($belanja as $b){
                    $total_harga += ($b->iklan->harga)*($b->jumlah);
                }
            }
        }

        return $total_harga;
    }

    public static function getTotalHarga($tipe)
    {
        $diskon = 0; //1
        $nominal = 0; //1
        $voucher = Voucher::where('user_id', Auth::user()->id)->where('pakai', 1)->first(); //2
        if($voucher != null){ //2
            $nominal = $voucher->jumlah; //3
        } //3
        
        $TotalHarga = HomeHelper::hitungTotalHarga($tipe); //4
        
        if($TotalHarga > 1000000){ //4
            $diskon = $TotalHarga * 0.1; //5
        } //5

        $TotalHarga = $TotalHarga - $diskon - $nominal + 15000; //6
        if($TotalHarga < 0){  //6
            $TotalHarga = 0; //7
        } //7

        return $TotalHarga; //8
    }

    public static function getIklanVerified()
    {
        $iklan = [];
        
        foreach(HomeHelper::getCategory() as $c) {
            array_push($iklan, Iklan::where('isVerified', 1)->where('kategori_id', $c->id)->get());
        }

        return $iklan;
    } 

    public static function getIklan($id)
    {
        $iklan = Iklan::findOrFail($id);
        return $iklan;
    } 

    public static function getDiskon($tipe)
    {
        $diskon = 0;

        if(HomeHelper::hitungTotalHarga($tipe) > 1000000){
            $diskon = HomeHelper::hitungTotalHarga($tipe) * 0.1;
        }

        return $diskon;
    }

    public static function getHargaAwal($tipe)
    {
        $harga_awal = HomeHelper::hitungTotalHarga($tipe);
        return $harga_awal; 
    } 

    public static function getPoin()
    {
        $poinTambah = HomeHelper::getTotalHarga('status') * 0.001;
        return $poinTambah;
    }

    public static function getTotalPoin()
    {
        $poin = Poin::where('user_id', Auth::user()->id)->firstOrFail();
        return $poin;
    }
    
}