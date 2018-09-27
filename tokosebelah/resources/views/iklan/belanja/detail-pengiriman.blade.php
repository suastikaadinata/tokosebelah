@extends('layout')

@section('title', 'Detail Pengiriman')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Detail Pengiriman</h1>
        <hr>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="detail-pengiriman-container">
                    <h4>Penerima Barang : {{ $pengiriman->nama }}</h4>
                    <h4>No Telepon : {{ $pengiriman->nomor_telepon }}</h4>
                    <h4>Alamat Penerima : {{ $pengiriman->alamat_pengiriman }}</h4>
                    <h4>Provinsi : {{ $pengiriman->provinsi->provinsi }}</h4>
                    <h4>Kabupaten : {{ $pengiriman->kabupaten->kabupaten }}</h4>
                    <div style="margin-top: 20px; margin-bottom: 15px;" class="row">
                        <div style="padding-right: 5px;" class="col-xs-6">
                            <a href="/belanja/edit-data-pengiriman/{{ $pengiriman->id }}" style="width: 100%;" class="btn btn-default btn-lg">Edit</a>
                        </div>
                        <div style="padding-left: 5px;" class="col-xs-6">
                            @if($total_harga > 0)
                                <a href="/belanja/pembayaran" style="width: 100%;" class="btn btn-default btn-lg">Lanjutkan Pembayaran</a>
                            @else
                                <a href="/belanja/data-pengiriman/pembayaran/selesai" style="width: 100%;" class="btn btn-default btn-lg">Pembayaran Selesai</a>
                            @endif
                        </div>
                    </div>
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
                <h3>Jumlah</h3>
            </div>                       
        </div>
        @foreach((new App\Helper\HomeHelper)->getBelanja() as $b)
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
                <h4>Harga awal: Rp. {{ (new App\Helper\HomeHelper)->getHargaAwal('belanja') }}</h4>
                <h4>Biaya pengiriman: Rp. 15000</h4>
                    @if((new App\Helper\HomeHelper)->getDiskon('belanja') > 0)                  
                        <h4>Diskon: Rp. {{ (new App\Helper\HomeHelper)->getDiskon('belanja') }}</h4>
                        <input type="hidden" id="diskon" value="{{ (new App\Helper\HomeHelper)->getDiskon('belanja') }}" />
                    @else
                        <input type="hidden" id="diskon" value="0" />  
                    @endif
                    @if($voucher != null)
                        <h4>Voucher: Rp. {{ $voucher->jumlah }}</h4>
                    @endif
                    <div id="info-harga">
                        <h4 style="margin-top: 0px; float: right"class="harga-produk">Rp. {{ $total_harga }}</h4> 
                        <h4 style="margin-right: 110px;"class="h-total-belanja">Total Harga: </h4>  
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($modal == 1)
    <input type="hidden" id="uploadPembayaran" value="1">
    @else
    <input type="hidden" id="uploadPembayaran" value="0">
    @endif
    <div id="modal-upload-pembayaran" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="modal-title">Pemberitahuan</h3>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-size: 1.2em;">Pembayaran anda berhasil dan tunggu sampai di verifikasi oleh admin 
                        kemudian anda akan mendapatkan invoice</p>
                </div>
                <div style="text-align: center;" class="modal-footer">        
                    <button style="width: 200px; font-size: 1.3em;" type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
@endsection