@extends('layout')

@section('title', 'Pesan')

@section('content')
<div class="container">
    <h1 style="text-align: center;">Pesan</h1>
    <hr>
    <div class="row">
        <div class="col-lg-1">
            <div class="pesan-user-picture" style="background-image: url({{ $pesan->user->foto() }})"></div>
        </div>
        <div class="col-lg-11">
            <h3 style="margin-left:-15px;">{{ $pesan->user->name }}
                @if($pesan->user->tipe == 'admin')
                    - Admin
                @endif
            </h3>
        </div>
    </div>
    <div style="margin-top: 20px;" class="row">
        <div class="col-lg-10">
            <div class="isi-pesan-container">
                <p>{{ $pesan->isi }}</p>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
    @if($pesan->jenis == "pembayaran" && $pengiriman->pembayaran_id != null)
    <div style="margin-top: 30px;" class="row">
            <div class="col-lg-6">
                <div class="invoice-container">
                    <h3 style="text-align: center">Invoice</h3>
                    <hr>
                    <h4>Harga Awal: Rp. {{ $harga_awal }}</h4>
                    <h4>Biaya Pengiriman: Rp. 15000</h4>
                    @if( $pengiriman->pembayaran->diskon > 0)
                        <h4>Diskon: Rp. {{ $pengiriman->pembayaran->diskon }}</h4>
                    @endif
                    @if( $pengiriman->pembayaran->voucher > 0)
                        <h4>Voucher: Rp. {{ $pengiriman->pembayaran->voucher }}</h4>
                    @endif
                    <hr>
                    <h4>Total Harga: Rp. {{ $pengiriman->pembayaran->total_harga }}</h4>
                    <h4>Estimasi Pengiriman: 1 - 2 Minggu</h4>        
                </div>
            </div>
        <div class="col-lg-6"></div>
    </div>
    @endif
</div>
@endsection