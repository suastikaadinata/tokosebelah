@extends('layout')

@section('title', 'Kategori Iklan')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">{{ $categoryId->nama }}</h1>
        <hr>
        <div class="row">
            @foreach($iklan as $c)
                <div class="col-lg-3 col-produk-kategori-container">
                    <div class="produk-kategori-container">
                        <a href="/iklan/detail/{{ $categoryId->id }}/{{ $c->id }}">
                            <div class="produk-container-img" style="background-image: url({{ $c->gambarPertama->foto }})"></div>
                        </a>
                        <div class="informasi-produk">
                            <h4 class="nama-produk">{{ $c->judul }}</h4>
                            <h4 class="harga-produk">{{ $c->harga }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach            
        </div>
    </div>
@endsection