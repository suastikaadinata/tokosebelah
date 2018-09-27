@extends('admin.layout')

@section('title', 'Detail Pembayaran')

@section('title-header', 'Detail Pembayaran')

@section('content')
    <div class="detail-pembayaran-container">
        <div class="row row-transaksi">
            <div style="margin-bottom: 10px;" class="col-xs-4">
                <h3 style="text-align: center;">Bukti Pembayaran</h3>
                <hr style="margin-right: -15px;">
                <div class="foto-transaksi-picture" style="background-image: url({{ $pembayaran->foto() }})"></div>
            </div>
            <div style="text-align: center;" class="col-xs-8">
                <h3 >Keterangan</h3>
                <hr style="margin-left: -15px;">         
                <div class="user-picture" style="background-image: url({{ $pembayaran->user->foto() }})"></div>
                <h3 style="margin-top: 10px;"><i class="fa fa-user" aria-hidden="true"> {{ $pembayaran->user->name }}</i></h3>
                <h4>Total Harga: Rp. {{ $pembayaran->total_harga }}</h4>
                <a style="margin-top: 10px;" href="/admin/verifikasi-pembayaran/detail-pembayaran/daftar-belanja/{{ $pembayaran->id }}/{{ $pembayaran->user_id }}" class="btn btn-default btn-lg lihat-daftar-belanja-btn">
                    Lihat Daftar Belanja
                </a>
                <hr>
                <div class="row">
                    @if($pembayaran->isVerified == 0)
                        <div style="padding-right: 5px;" class="col-xs-6">
                            <a style="width: 100%;" href="/admin/verifikasi-pembayaran/detail-pembayaran/verified/{{ $pembayaran->id }}/{{ $pembayaran->user_id }}" class="btn btn-default btn-lg">
                                Verifikasi
                            </a>
                        </div>
                        <div style="padding-left: 5px;" class="col-xs-6">
                            <a href="/admin/verifikasi-pembayaran/detail-pembayaran/tolak/{{ $pembayaran->id }}" class="btn btn-default btn-lg tolak-iklan-btn">
                                Tolak
                            </a>
                        </div>
                    @else
                        <div class="col-lg-3"></div>
                        <div style="padding-left: 5px; padding-right: 5px" class="col-xs-6">
                            <a href="/admin/verifikasi-pembayaran/detail-pembayaran/hapus/{{ $pembayaran->id }}" class="btn btn-default btn-lg tolak-iklan-btn"><i class="fa fa-trash"></i>
                                Hapus
                            </a>
                        </div>
                        <div class="col-lg-3"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection