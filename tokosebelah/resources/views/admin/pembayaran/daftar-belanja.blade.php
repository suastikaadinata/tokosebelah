@extends('admin.layout')

@section('title', 'Daftar Belanja')

@section('title-header', 'Daftar Belanja')

@section('content')
    <div style="margin-top: 30px;" class="user-profile-container">
        <div class="user-picture-daftar-belanja" style="background-image: url({{ $pembayaran->user->foto() }})"></div>
        <h3 style="margin-top: 10px; text-align: center"><i class="fa fa-user" aria-hidden="true"> {{ $pembayaran->user->name }}</i></h3>
    </div>
    <div style="margin-top: 30px;" class="row header-list-belanja">      
        <div class="col-xs-8">
            <h3>Produk</h3>
        </div>
        <div class="col-xs-2">
            <h3>Harga</h3>
        </div>   
        <div class="col-xs-2">
            <h3>Jumlah</h3>
        </div>                       
    </div>
    @foreach($belanja as $p)
        <div class="row row-list-belanja">
            <div class="col-xs-2 pictures-produk">
                <div class="list-produk-pictures" style="background-image: url({{ $p->iklan->gambarPertama->foto }}); height: 100px;"></div>
            </div>
            <div class="col-xs-6 nama-produk">
                <h4>{{ $p->iklan->judul }}</h4>
            </div>
            <div class="col-xs-3 harga">
                <h4>Rp. {{ $p->iklan->harga }}</h4>
            </div>
            <div class="col-xs-1 Jumlah">
                <h4>{{ $p->jumlah }}</h4>
            </div>
        </div>
    @endforeach
    <div style="padding-right: 12px;" class="row footer-list-belanja">
        <div class="col-xs-7"></div>
        <div style="text-align: right;" class="col-xs-5">
        <div class="total-belanja">
        <h4>Harga awal: Rp. {{ $pembayaran->harga_awal }}</h4>
        <h4>Biaya pengiriman: Rp. 15000</h4>
            @if($pembayaran->diskon > 0)
                <h4>Diskon: Rp. {{ $pembayaran->diskon }}</h4>
                <input type="hidden" id="diskon" value="{{ (new App\Helper\HomeHelper)->getDiskon('belanja') }}" />
            @else
                <input type="hidden" id="diskon" value="0" />  
            @endif
            @if($voucher != null)
                <h4>Voucher: Rp. {{ $voucher->jumlah }}</h4>
            @endif
                <div id="info-harga">
                    <h4 style="margin-top: 0px; float: right"class="harga-produk">Rp. {{ $pembayaran->total_harga }}</h4> 
                    <h4 style="margin-right: 110px;"class="h-total-belanja">Total Harga: </h4>  
                </div>
        </div>
            <a style="width: 80%" href="/admin/verifikasi-pembayaran/detail-pembayaran/{{ $pembayaran->id }}" class="btn btn-default btn-lg">Kembali ke Verifikasi</a>
        </div>
    </div>
@endsection