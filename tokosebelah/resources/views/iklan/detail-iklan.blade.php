@extends('layout')

@section('title', 'Detail Iklan')

@section('content')
    <div class="container">
        <div class="row">
            <div class="header-iklan-detail-container">
                <div class="col-lg-1">
                    <a href="/profile/{{ $iklanId->user_id }}">
                        <div class="header-profil-user-iklan-detail"
                            style="background-image:url({{ $iklanId->user->foto() }})">
                        </div>
                    </a>
                </div>
                <div class="col-lg-11">
                    <div style="margin-left:-15px;" class="header-nama-produk-iklan-detail">
                        <h3>{{ $iklanId->judul }}</h3>
                        <input type="hidden" id="judul-iklan" value="{{ $iklanId->id }}">
                        <h4 style="float: left; margin-top: -0.5px;">Penjual: {{ $iklanId->user->name }}</h4>
                        <h4 style="margin-left: 250px;"><i class="fa fa-map-marker" aria-hidden="true"></i> 
                        {{ $iklanId->kabupaten->kabupaten }}, {{$iklanId->provinsi->provinsi}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="iklan-detail-foto-container">
                    <div class="row">
                        <div class="col-xs-2 sub-foto-container">                      
                            @foreach($iklanId->foto as $k => $f)                    
                                <div class="sub-foto{{ $k+1 }}" 
                                    style="background-image:url({{ $f->foto }})" data-alt-bg="{{ $f->foto }}">
                                </div> 
                            @endforeach
                        </div> 
                        <div class="col-xs-10">
                            <div class="main-foto" 
                                style="background-image:url({{ $iklanId->gambarPertama->foto }})">
                            </div>
                            <div style="margin-top: 20px;" id="like-dislike" class="like-dislike"> 
                                @if(Auth::user())                 
                                    <div id="dislike-iklan" class="dislike-product" onclick="dislikeIklan({{ $iklanId->id }})">
                                @else
                                    <div class="dislike-product">
                                @endif
                                        <h4><i class="fa fa-thumbs-down fa-lg" aria-hidden="true" value="dislike"></i> {{ $iklanId->dislike }}</h4> 
                                        <input type="hidden" id="dislike-iklan-value" value="{{ $iklanId->dislike }}">
                                    </div>  
                                @if(Auth::user())
                                    <div id="like-iklan" class="like-product" onclick="likeIklan({{ $iklanId->id }})">
                                @else
                                    <div class="like-product">
                                @endif
                                        <h4><i class="fa fa-thumbs-up fa-lg" aria-hidden="true" value="like"></i> {{ $iklanId->like }}</h4> 
                                        <input type="hidden" id="like-iklan-value" value="{{ $iklanId->like }}">
                                    </div>
                            </div>     
                        </div>                               
                    </div> 
                    <div class="comment-header">
                        <hr>  
                        <h3>Komentar</h3>
                    </div>
                    <div id="comment-list1">
                        @foreach($comment as $c)
                            <div class="row row-user-comment">
                                <div class="col-xs-1 user-comment-foto">
                                    <a href="/profile/{{ $c->user_id }}">
                                        <div class="picture-user-comment"
                                            style="background-image:url({{ $c->user->foto() }});">
                                        </div>
                                    </a>
                                </div> 
                                <div class="col-xs-11">
                                    <div class="user-comment-list">
                                        <h4 style="margin-top: 20px;">{{ $c->user->name }}</h4>
                                        <p>{{ $c->isi }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(Auth::user())
                        <div class="row user-product-comment">
                            <div class="col-xs-1 user-comment-foto">
                            <input type="hidden" id="user-comment-foto" value="{{ Auth::user()->id }}"> 
                                <div class="picture-user-comment"
                                    style="background-image:url({{ Auth::user()->foto() }});">
                                </div>
                            </div> 
                            <div class="col-xs-11 user-comment">
                                <form id="formComment1" name="formComment" novalidate="">
                                {{ csrf_field() }}
                                    <div class="input-comment">
                                        <div class="form-group form{{ $errors->has('comment') ? ' has-error' : '' }}">
                                            <input id="comment1" type="text" class="form-control input-lg" required autofocus placeholder="Masukkan komentar anda" name="comment" value="">

                                            @if($errors->has('comment'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('comment') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <button id="kirim-comment" type="button" onclick="commentIklan({{ Auth::user()->id }}, {{ $iklanId->id }}, document.getElementById('comment1').value, 1)" class="btn btn-default btn-lg kirim-comment">
                                        Kirim
                                    </button>
                                    <input type="hidden" id="comment_id" name="comment_id" value="0">
                                    <input type="hidden" id="comment_username" name="comment_username" value="{{ Auth::user()->name }}">
                                    <input type="hidden" id="comment_user_picture" name="comment_user_picture" value="{{ Auth::user()->foto() }}">
                                </form>
                            </div>      
                        </div>
                    @endif                                
                </div>
            </div>
            <div class="col-lg-6">
                <div class="iklan-detail-container">
                    <div class="deskripsi-produk">
                        <h4 style="color: #999999;">Deskripsi</h4>
                        <h4>{{ $iklanId->judul }}</h4></br>
                        <p style="text-align: justify;">
                            {{ $iklanId->deskripsi }}
                        </p>
                    </div>
                    <hr style="border-top: 1px solid #1abc9c;">
                    <div class="row">
                        <div class="col-xs-7 features-product">
                            <h4 style="color: #999999;">Fitur Produk</h4>
                            @foreach($iklanId->feature as $f)
                                @if($f->fitur != null)
                                    <li>{{$f->fitur}}</li>
                                @endif
                            @endforeach
                        </div>    
                        <div class="col-xs-5">
                            <h4 style="color: #999999;">Harga</h4>                                                 
                            <h2 class="harga-detail-product">{{ $iklanId->harga }}</h2>                       
                        </div>
                    </div>
                    <hr style="border-top: 1px solid #1abc9c;">
                    <div class="row">
                    @if(!Auth::user())
                        <div style="padding-right: 5px;" class="col-xs-6">
                            <a href="/login" class="btn btn-default btn-lg beli-sekarang-btn">BELI SEKARANG</a>
                        </div>
                        <div style="padding-left: 5px;" class="col-xs-6">
                            <a href="/login" class="btn btn-default btn-lg tambah-to-bag-btn">TAMBAHKAN KE TROLI</a>
                        </div>
                    @else
                        <div style="padding-right: 5px;" class="col-xs-6">
                            <form action="/iklan/detail/beli-sekarang/{{ $iklanId->id }}" method="POST">
                            {{ csrf_field() }}
                                <button class="btn btn-default btn-lg beli-sekarang-btn">
                                    BELI SEKARANG
                                </button>
                            </form>
                        </div>                   
                        <div style="padding-left: 5px;" class="col-xs-6">
                            <form action="/iklan/detail/tambah-daftar-belanja/{{ $iklanId->id }}" method="POST">
                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-default btn-lg tambah-to-bag-btn">
                                    TAMBAHKAN KE TROLI
                                </button>
                            </form>
                        </div>                 
                    @endif
                    </div>
                </div>
            </div>
        </div>

        @if(count($iklan) > 0)           
            <div style="margin-top: 70px;"class="row-category-home">
                <div class="row header-produk-container">
                    <div class="col-lg-1">
                        <h2>Rekomendasi</h2>
                    </div>
                    <div class="col-lg-11"></div>                      
                </div>         
                <div class="row row-home">                 
                    @foreach($iklan as $i)                         
                        <div href="/iklan/detail/{{ $i->kategori_id }}/{{ $i->id }}" class="col-lg-3 produk-container">
                            <a href="/iklan/detail/{{ $i->kategori_id }}/{{ $i->id }}">
                                <div class="produk-container-img" style="background-image: url({{ $i->gambarPertama->foto }})"></div>
                            </a>
                            <div class="informasi-produk">
                                <h4 class="nama-produk">{{ $i->judul }}</h4>
                                <h4 class="harga-produk">Rp.{{ $i->harga }}</h4>
                            </div>
                        </div>                          
                    @endforeach
                    @if(count($iklan) > 4)
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
    </div>
@endsection