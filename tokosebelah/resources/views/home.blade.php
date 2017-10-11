@extends('layout');

@section('content')
    <div class="container">
        <div class="main-produk-container">
            <div class="row header-produk-container">
                <div class="col-lg-1">
                    <h2>Olahraga</h2>
                </div>
                <div class="col-lg-9"></div>
                <div class="col-lg-2 cek-selengkapnya">
                    <a href="" class="btn btn-default-btn-lg selengkapnya-btn">Lihat Selengkapnya</a>
                </div>
            </div>         
            <div class="row">
                @for($i=0;$i<4;$i++)
                <div href="" class="col-lg-3 produk-container">
                    <a href=""><img src="{{ asset('img/sepatu.jpg') }}"></a>
                    <div class="informasi-produk">
                        <h4 class="nama-produk">Sepatu Adidas anti kw</h4>
                        <h4 class="harga-produk">Rp.900.000</h4>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
@endsection