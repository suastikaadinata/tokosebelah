@extends('layout')

@section('title', 'Cara Melakukan Pembayaran')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Cara Melakukan Pembayaran</h1>
        <div class="tentang-container">
            <div class"pembayaran-header">
                <h4 style="margin-bottom: 40px;">Pembayaran dapat dilakukan dengan melakukan transfer ke salah satu bank berikut: </h4>
            </div>
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
    </div>
@endsection