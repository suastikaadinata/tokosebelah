@extends('layout')

@section('title', 'List Barang')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Daftar Belanja</h1>
        <hr>
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
                    <a href="/belanja/list-belanja/delete/{{$b->id}}" class="btn btn-default btn-lg hapus-list-produk-btn"><i class="fa fa-trash"></i>
                        Hapus
                    </a>
                </div>                  
            </div>
        @endforeach
        <div style="padding-right: 12px;" class="row footer-list-belanja">
            <div class="col-lg-6"></div>
            <div style="text-align: right;" class="col-lg-6">
                <div class="total-belanja">
                <h4>Harga awal: Rp. {{ (new App\Helper\HomeHelper)->getHargaAwal('belanja') }}</h4>
                <h4>Biaya pengiriman: Rp. 15000</h4>
                    @if((new App\Helper\HomeHelper)->getDiskon('belanja') > 0)
                        <h4>Diskon: Rp. {{ (new App\Helper\HomeHelper)->getDiskon('belanja') }}</h4>
                        <input type="hidden" id="diskon" value="{{ (new App\Helper\HomeHelper)->getDiskon('belanja') }}" />
                    @else
                        <input type="hidden" id="diskon" value="0" />  
                    @endif
                    <div id="info-harga">
                        <h4 style="margin-top: 0px; float: right"class="harga-produk">Rp. {{(new App\Helper\HomeHelper)->getTotalHarga('belanja')}}</h4>
                        <h4 style="margin-right: 110px;"class="h-total-belanja">Total Harga: </h4>   
                    </div>         
                    <input type="hidden" id="total_harga" value="{{(new App\Helper\HomeHelper)->getTotalHarga('belanja')}}">       
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div style="margin-top: 20px;" class="form-group{{ $errors->has('voucher') ? ' has-error' : '' }}">                            
                            <select class="form-control input-lg voucher-select" name="voucher">
                                <option selected value="" disabled>Voucher Anda</option>
                                @if(sizeof($voucher) > 0)
                                    @foreach($voucher as $v)
                                        <option {{ $v->id == old('voucher') ? 'selected' : '' }} value="{{ $v->jumlah }}">{{ $v->kode }} - Rp. {{ $v->jumlah }}</option>
                                    @endforeach
                                @else
                                    <option disabled>Anda belum memiliki voucher</option>
                                @endif
                            </select>

                            @if ($errors->has('voucher'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('voucher') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div id="lanjut-bayar-btn">
                            <a style="width: 100%" href="/belanja/data-pengiriman" class="btn btn-default btn-lg">Lanjutkan Pembayaran</a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
    <div id="modal-diskon" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="modal-title">Anda mendapatkan diskon</h3>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-size: 1.3em;">Selamat karena total belanja anda diatas 1 juta, anda mendapatkan diskon 10% atau potongan 
                        harga sebesar Rp. {{ (new App\Helper\HomeHelper)->getDiskon('belanja') }}</p>
                </div>
                <div style="text-align: center;" class="modal-footer">        
                    <button style="width: 200px; font-size: 1.3em;" type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
@endsection