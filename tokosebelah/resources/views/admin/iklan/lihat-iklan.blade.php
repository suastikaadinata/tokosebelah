@extends('admin.layout')

@section('title', 'Detail Iklan')

@section('title-header', 'Detail Iklan')

@section('content')
    <div class="row">
        @foreach($iklan->foto as $i)
            <div class="col-xs-3 admin-detail-iklan">
                <div class="picture" style="background-image: url({{ $i->foto }});"></div>
            </div>
        @endforeach
    </div>
    <div class="detail-iklan-container">
        <div class="deskripsi-detail-iklan">
            <h4 style="color: #999999;">Deskripsi</h4>
            <h4>{{ $iklan->judul }}</h4></br>
            <p style="text-align: justify;">
                {{ $iklan->deskripsi }}
            </p>
        </div>
        <hr style="border-top: 1px solid #1abc9c;">
        <div class="row feature-harga-detail-iklan">
            <div class="col-xs-7 features-product">
                <h4 style="color: #999999;">Fitur Produk</h4>
                @foreach($iklan->feature as $i)
                    @if($i->fitur != null)
                        <li>{{ $i->fitur }}</li>
                    @endif
                @endforeach
            </div>    
            <div class="col-xs-5">
                <h4 style="color: #999999;">Harga</h4>                                                 
                <h2 class="harga-detail-product">Rp.{{ $iklan->harga }}</h2>                       
            </div>
        </div>
        <hr style="border-top: 1px solid #1abc9c;">
        <div class="row">
            @if($iklan->isVerified == 0)
                <div style="padding-right: 5px;" class="col-xs-6">
                    <a style="width: 100%;" href="/admin/list-iklan/lihat-iklan/verify/{{ $iklan->id }}" class="btn btn-default btn-lg terima-iklan-btn">VERIFIKASI</a>
                </div>
                <div style="padding-left: 5px;" class="col-xs-6">
                    <a class="btn btn-default btn-lg tolak-iklan-btn" href="/admin/list-iklan/lihat-iklan/tolak/{{ $iklan->id }}">TOLAK</a>
                </div>
            @else
                <div class="col-xs-3"></div>
                <div style="padding-left: 5px; padding-right: 5px;" class="col-xs-6">
                    <a class="btn btn-default btn-lg tolak-iklan-btn" href="/admin/list-iklan/lihat-iklan/hapus/{{ $iklan->id }}"><i class="fa fa-trash"></i> Hapus</a>
                </div>
                <div class="col-xs-3"></div>
            @endif
        </div>
    </div>
@endsection