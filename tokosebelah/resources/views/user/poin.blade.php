@extends('layout')

@section('title', 'Poin Anda')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Poin</h1>
        <div class="poin-container">
            <span style="font-size: 2em;">Poin Anda: <span id="jumlah-poin" class="jumlah-poin">{{ (new App\Helper\HomeHelper)->getTotalPoin()->poin }}</span> Poin </span><br>
            <button style="margin-top: 20px;" class="btn btn-default btn-lg" data-toggle="modal" data-target="#voucher-user">
                Voucher Anda
            </button>
        </div>
        <input type="hidden" id="user_id_poin" value="{{ Auth::user()->id }}">
        <hr>
        <h3>Penukaran Poin</h3>
        <h5>Tukarkan poin anda dengan voucher di bawah ini:</h5>
        <div style="margin-top: 30px;" class="row row-voucher-poin">
            <div class="col-lg-3">
                <div class="col-voucher">
                    <h4>2000 Poin</h4>
                    @if((new App\Helper\HomeHelper)->getTotalPoin()->poin < 2000)
                        <img class="poin-kurang" src="{{ asset('img/voucher-belanja-1.png') }}">
                        <h4>Poin anda belum cukup</h4>
                    @else
                        <img class="poin-cukup" src="{{ asset('img/voucher-belanja-1.png') }}" onclick="klikVoucherSatu()">
                        <h4>Klik voucher untuk tukarkan poin</h4>
                    @endif
                </div>
            </div>
            <div class="col-lg-3">
                <div class="col-voucher">
                    <h4>4000 Poin</h4>
                    @if((new App\Helper\HomeHelper)->getTotalPoin()->poin < 4000)
                        <img class="poin-kurang" src="{{ asset('img/voucher-belanja-2.png') }}">
                        <h4>Poin anda belum cukup</h4>
                    @else
                        <img class="poin-cukup" src="{{ asset('img/voucher-belanja-2.png') }}" onclick="klikVoucherDua()">
                        <h4>Klik voucher untuk tukarkan poin</h4>
                    @endif
                </div>
            </div>
            <div class="col-lg-3">
                <div class="col-voucher">
                    <h4>6000 Poin</h4>
                    @if((new App\Helper\HomeHelper)->getTotalPoin()->poin < 6000)
                        <img class="poin-kurang" src="{{ asset('img/voucher-belanja-3.png') }}">
                        <h4>Poin anda belum cukup</h4>
                    @else
                        <img class="poin-cukup" src="{{ asset('img/voucher-belanja-3.png') }}" onclick="klikVoucherTiga()">
                        <h4>Klik voucher untuk tukarkan poin</h4>
                    @endif
                </div>
            </div>
            <div class="col-lg-3 ">
                <div class="col-voucher">
                    <h4>8000 Poin</h4>
                    @if((new App\Helper\HomeHelper)->getTotalPoin()->poin < 8000)
                        <img class="poin-kurang" src="{{ asset('img/voucher-belanja-4.png') }}">
                        <h4>Poin anda belum cukup</h4>
                    @else
                        <img class="poin-cukup" src="{{ asset('img/voucher-belanja-4.png') }}" onclick="klikVoucherEmpat()">
                        <h4>Klik voucher untuk tukarkan poin</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="modal-tukar-poin" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="modal-title">Penukaran Poin</h3>
                </div>
                <div style="text-align: center;"class="modal-body">
                    @if(!is_null($voucher))
                        <span style="font-size: 1.2em;">Selamat anda mendapatkan voucher potongan harga sebesar Rp. <span class="uang-voucher">{{ $voucher->jumlah }}</span></span><br>
                        <span style="font-size: 1.5em;">Kode Voucher: <span class="kode-voucher-modal">{{ $voucher->kode }}</span></span>
                    @endif
                </div>
                <div style="text-align: center;" class="modal-footer">        
                    <button style="width: 200px; font-size: 1.3em;" type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>

    <div id="voucher-user" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="modal-title">Voucher Anda</h3>
                </div>
                <div class="modal-body">
                    @if(count($voucherUser) == 0)
                        <h4 style="text-align: center;">Anda belum memiliki voucher apapun</h4>
                    @else
                        @foreach($voucherUser as $v)
                            <div style="margin-bottom: 20px;" class="list-voucher">
                                <span style="font-size: 1.2em;">Voucher potongan harga sebesar Rp. <span class="uang-voucher">{{ $v->jumlah }}</span></span><br>
                                <span style="font-size: 1.5em;">Kode Voucher: <span class="kode-voucher-modal">{{ $v->kode }}</span></span><br>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div style="text-align: center;" class="modal-footer">        
                    <button style="width: 200px; font-size: 1.3em;" type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
@endsection