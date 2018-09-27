@extends('layout')

@section('title', 'Detail Pengiriman')

@section('content')
    <div class="container">
        <div style="margin-top: 30px; margin-bottom: 50px;" class="row">
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <a href="/pesanan" class="btn btn-default btn-lg pesanan-biru-btn">Pesanan Saat Ini</a>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <a style="width: 100%;" href="/pesanan/selesai" class="btn btn-default btn-lg pesanan-hijau-btn">Pesanan Selesai</a>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1"></div>
        </div>
        @if(sizeof((new App\Helper\HomeHelper)->getBelanjaKirim()) > 0)
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="detail-pengiriman-container">
                        <h4>Penerima Barang : {{ $pengiriman->nama }}</h4>
                        <h4>No Telepon : {{ $pengiriman->nomor_telepon }}</h4>
                        <h4>Alamat Penerima : {{ $pengiriman->alamat_pengiriman }}</h4>
                        <h4>Provinsi : {{ $pengiriman->provinsi->provinsi }}</h4>
                        <h4>Kabupaten : {{ $pengiriman->kabupaten->kabupaten }}</h4>
                        @if($pengiriman->pembayaran_id != null)
                            <h4>Estimasi Pengiriman: 1 - 2 Minggu</h4>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
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
            @foreach((new App\Helper\HomeHelper)->getBelanjaKirim() as $b)
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
            <div style="padding-right: 12px;" class="row footer-list-belanja">
                <div class="col-lg-9"></div>
                <div style="text-align: right;" class="col-lg-3">
                    <div class="total-belanja">
                        <h4>Harga awal: Rp. {{ (new App\Helper\HomeHelper)->getHargaAwal('kirim') }}</h4>
                        <h4>Biaya Pengiriman: Rp. 15000</h4>
                            @if((new App\Helper\HomeHelper)->getDiskon('kirim') > 0)                    
                                <h4>Diskon: Rp. {{ (new App\Helper\HomeHelper)->getDiskon('kirim') }}</h4>
                                <input type="hidden" id="diskon" value="{{ (new App\Helper\HomeHelper)->getDiskon('kirim') }}" />
                            @else
                                <input type="hidden" id="diskon" value="0" />  
                            @endif
                            @if($nominal > 0)
                                <h4>Voucher: Rp. {{ $nominal }}</h4>
                            @endif
                            <h4 style="margin-top: 0; float: right"class="harga-produk">Rp. {{ (new App\Helper\HomeHelper)->getTotalHarga('kirim') }}</h4>
                            <h4 style="margin-right: 110px;"class="h-total-belanja">Total Harga: </h4>                   
                            @if(sizeof($belanja) > 0)
                                <a style="width: 100%" href="/pesanan/diterima" class="btn btn-default btn-lg">Barang Telah Diterima</a>
                            @else
                                @if((new App\Helper\HomeHelper)->getTotalHarga('kirim') > 0)
                                    <a style="width: 100%" href="/belanja/pembayaran" class="btn btn-default btn-lg">Pembayaran</a>
                                @else
                                    <a style="width: 100%" href="/belanja/data-pengiriman/pembayaran/selesai" class="btn btn-default btn-lg">Pembayaran</a>
                                @endif
                            @endif
                    </div>
                </div>
            </div>
        @else
        <h2 style="text-align: center; margin-top: 60px;">Anda belum melakukan pemesanan</h2>
        @endif
    </div>
    @if(session()->has('diterima'))
        <input type="hidden" id="diterima" value="1">
    @else
        <input type="hidden" id="diterima" value="0">
    @endif
    <div id="modal-pesanan-diterima" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="modal-title">Barang Telah Diterima</h3>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-size: 1.2em;">Terima kasih karena telah berbelanja di tokosebelah.com</p>
                </div>
                <div style="text-align: center;" class="modal-footer">        
                    <button style="width: 200px; font-size: 1.3em;" type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
@endsection