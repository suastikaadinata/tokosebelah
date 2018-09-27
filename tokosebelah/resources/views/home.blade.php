@extends('layout');

@section('content')
    <div class="container">
        <div class="main-produk-container">
            @foreach((new App\Helper\HomeHelper)->getCategory() as $k => $c)
                @if(count($iklan[$k]) > 0)           
                    <div class="row-category-home">
                        <div class="row header-produk-container">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <h2>{{ $c->nama }}</h2>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-3"></div>
                            <div class="col-lg-2 col-md-2 col-sm-3 cek-selengkapnya">
                                <a href="/iklan/list-by-kategori/{{ $c->id }}" class="btn btn-default-btn-lg selengkapnya-btn">Lihat Selengkapnya</a>
                            </div>
                        </div>         
                        <div class="row row-home">                 
                            @foreach($iklan[$k] as $i)
                                @if($c->id == $i->kategori_id)
                                    <div href="/iklan/detail/{{ $c->id }}/{{ $i->id }}" class="col-lg-3 col-md-3 col-sm-3 produk-container">
                                        <a href="/iklan/detail/{{ $c->id }}/{{ $i->id }}">
                                            <div class="produk-container-img" style="background-image: url({{ $i->gambarPertama->foto }})"></div>
                                        </a>
                                        <div class="informasi-produk">
                                            <h4 class="nama-produk">{{ $i->judul }}</h4>
                                            <h4 class="harga-produk">Rp. {{ $i->harga }}</h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if(count($iklan[$k]) > 4)
                                <button class="btn btn-lg btn-default slide-left-btn">
                                    <i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i>   
                                </button> 
                                <button class="btn btn-lg btn-default slide-right-btn">
                                    <i class="fa fa-chevron-right fa-lg" aria-hidden="true"></i>   
                                </button>   
                            @endif                
                        </div>
                    </div>  
                @endif       
            @endforeach
        </div>
    </div>
@endsection