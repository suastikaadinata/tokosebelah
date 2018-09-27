@extends('layout')

@section('title', 'Hasil Pencarian')

@section('content')
    <div class="container">
        <h1>Hasil pencarian untuk '{{ $keyword }}'</h1>
        <hr>
        @if($search->isEmpty())
            <h3>Tidak ditemukan hasil untuk '{{ $keyword }}'</h3>
        @else
            <div class="row">        
                @foreach($search as $s)
                    <div class="col-lg-3 col-produk-kategori-container">
                        <div class="produk-kategori-container">
                            <a href="/iklan/detail/{{ $s->kategory_id }}/{{ $s->id }}">
                                <div class="produk-container-img" style="background-image: url({{ $s->gambarPertama->foto }})"></div>
                            </a>
                            <div class="informasi-produk">
                                <h4 class="nama-produk">{{ $s->judul }}</h4>
                                <h4 class="harga-produk">{{ $s->harga }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach                     
            </div>
        @endif
    </div>
@endsection