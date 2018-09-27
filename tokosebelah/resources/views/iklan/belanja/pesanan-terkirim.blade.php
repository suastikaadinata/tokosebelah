@extends('layout')

@section('title', 'Detail Pengiriman')

@section('content')
    <div class="container">
        <div style="margin-top: 30px;" class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-5">
                <a style="width: 100%;" href="/pesanan" class="btn btn-default btn-lg pesanan-hijau-btn">Pesanan Saat Ini</a>
            </div>
            <div class="col-lg-5">
                <a href="/pesanan/selesai" class="btn btn-default btn-lg pesanan-biru-btn">Pesanan Selesai</a>
            </div>
            <div class="col-lg-1"></div>
        </div>
        @if(sizeof($belanja) > 0)
            <div class="row header-list-belanja">      
                <div class="col-lg-6">
                    <h3>Produk</h3>
                </div>
                <div class="col-lg-3">
                    <h3>Harga</h3>
                </div>   
                <div class="col-lg-3">
                </div>                       
                    <h3>Jumlah</h3>
            </div>
            @foreach($belanja as $b)
                <div class="row row-list-belanja">                
                    <div class="col-lg-1 pictures-produk">
                        <div class="list-produk-pictures" style="background-image: url({{ $b->iklan->gambarPertama->foto }})"></div>
                    </div>
                    <div class="col-lg-5 nama-produk">
                        <h4>{{ $b->iklan->judul }}</h4>
                    </div>
                    <div class="col-lg-3 harga">
                        <h4 style="margin-top: 0px" class="harga-produk">Rp. {{ $b->iklan->harga }}</h4>
                    </div>
                    <div class="col-lg-1 Jumlah">
                        <h4>{{ $b->jumlah }}</h4>                  
                    </div>
                    <div class="col-lg-2 hapus">
                    </div>                  
                </div>
            @endforeach
        @else
            <h2 style="text-align: center; margin-top: 60px;">Anda belum memiliki pesanan yang telah selesai</h2>
        @endif
    </div>
@endsection