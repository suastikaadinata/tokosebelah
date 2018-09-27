@extends('layout')

@section('title', 'Pembayaran')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Pembayaran</h1>   
        <hr>   
        <div class"pembayaran-header">
            <h4 style="margin-top: 60px;">Cara melakukan pembayaran: </h4>
            <h4 style="margin-bottom: 40px;">Pembayaran dapat dilakukan dengan melakukan transfer ke salah satu bank berikut: </h4>
        </div>
        <div class="row row-rekening-info">
            <div class="col-lg-7">
                <div class="table-responsive">                                
                    <table class="table table-bordered table-rekening">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>               
                        </tr>
                        </thead>
                        <tbody>           
                            <tr>
                                <td>1</td>
                                <td style="background-image: url({{ asset('img/bank-logo/bank-bri.png') }})" class="fit logo-bank"></td>
                                <td>5888.0100.0627.511</td>
                                <td>tokosebelah.com</td>                  
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="background-image: url({{ asset('img/bank-logo/bank-bni.svg.png') }})" class="fit logo-bank"></td>
                                <td>010.535.123.4</td>
                                <td>tokosebelah.com</td>                  
                            </tr>  
                            <tr>
                                <td>3</td>
                                <td style="background-image: url({{ asset('img/bank-logo/bank-bca.png') }})" class="fit logo-bank"></td>
                                <td>001.777.121.8</td>
                                <td>tokosebelah.com</td>                  
                            </tr>  
                            <tr>
                                <td>4</td>
                                <td style="background-image: url({{ asset('img/bank-logo/bank-mandiri.png') }})" class="fit logo-bank"></td>
                                <td>700.000.646.887.9</td>
                                <td>tokosebelah.com</td>                  
                            </tr>             
                        </tbody>
                    </table>
                </div>
            </div>
            <div class=col-lg-5>
                <div class="info-pembayaran">
                    <p>Setelah melakukan transaksi pembayaran, pembeli diharapkan untuk mengupload bukti transaksi dengan mengklik "Pilih Gambar" untuk memilih gambar
                        yang akan diupload kemudian mengklik tombol "Upload Bukti Transaksi".
                        Bukti transaksi tersebut akan di verifikasi terlebih dahulu oleh administrator dan pembeli akan mendapatkan pesan bahwa pembayaran telah berhasil
                        jika bukti transfer tersebut memang benar.
                    </p>
                </div>
                <form action="/belanja/pembayaran/upload" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group upload-gambar-form {{ $errors->has('gambar-trf') ? ' has-error' : '' }}">
                        <label for="upload-gambar-trf" class="upload-gambar-trf">
                            <i class="fa fa-times hidden"></i>
                            <i class="fa fa-picture-o"></i> <span>Pilih Foto</span>
                            <input accept="image/*" class="upload-gambar-input" id="upload-gambar-trf" type="file"
                                required name="gambar-trf">
                        </label>

                        @if ($errors->has('gambar-trf'))
                            <span class="help-block" style="padding: 20px;">
                                <strong>{{ $errors->first('gambar-trf') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-default btn-lg upload-bukti-trf-btn">
                        Upload Bukti Transaksi
                    </button>
                </form>
            </div>
        </div>        
    </div>
    @if(session()->has('uploadPembayaran'))
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