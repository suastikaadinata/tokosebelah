<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,600|Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
</head>
<body>
<header>
    <div class="container top-content">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="web-logo">
                    <a href="/"><img src="{{ asset('img/logo-toko-sebelah.png') }}" ></a> 
                </div>
                <div class="category-top">
                    <h4 id="category-top-text" onclick="clickCategory()"><i class="fa fa-list fa-lg" aria-hidden="true"></i> Semua Kategori</h4>
                </div>
            </div>
            <form action="/search" method="GET">
                <div class="search">
                    <div class="col-lg-5 col-md-5 col-sm-5">          
                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="search" id="search" required autofocus placeholder="Cari barang yang ingin anda beli...">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-lg submit-btn" type="submit">
                                    <i class="fa fa-search search-icon"></i>
                                </button>
                            </span>                     
                        </div>                 
                    </div>
                </div>
            </form>
            <div class="col-lg-1 col-md-1 col-sm-1 keranjang">
                 <a style="font-size: 1.6em;" href="" class="keranjang-belanja-icon" data-toggle="modal" data-target=".keranjang-belanja"><img src="{{ asset('img/keranjang.png') }}" > 
                    @if(Auth::user())
                        @if(count((new App\Helper\HomeHelper)->getBelanja())>0)
                            {{ count((new App\Helper\HomeHelper)->getBelanja()) }}
                        @else
                            {{ count((new App\Helper\HomeHelper)->getBelanja()) }}  
                        @endif
                    @endif
                </a>
            </div>
            <div style="padding-left: 0px;" class="col-lg-1 col-md-1 col-sm-1">
                @if(Auth::user())
                    <div class="dropdown" style="display:inline-block;">
                        <button class="btn btn-default btn-lg dropdown-toggle" type="button" id="headerDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fa fa-bell-o"></i> {{ count((new App\Helper\NotificationHelper)->getNotification()) }} 
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu notif-box" aria-labelledby="headerNotification" style="width: 250px;">
                            <li class="dropdown-header"
                                style="text-align: center; font-size: 16px; color: #222; padding-bottom: 0;">Notifikasi Anda
                            </li>
                            <li role="separator" class="divider"></li>
                            @if(count((new App\Helper\NotificationHelper)->getNotification()) == 0)
                                <li><a href="">Belum ada notifikasi</a></li>
                            @else
                                @foreach((new App\Helper\NotificationHelper)->getNotification() as $notif)
                                    @if($notif->pesan_id != null)
                                        <li><a href="/baca-pesan/{{ $notif->pesan_id }}/{{ $notif->id }}">
                                            <span>
                                                <span class="notif-new">baru</span> Pesan baru dari
                                            </span></br>
                                            @if((new App\Helper\PesanHelper)->getPesan($notif->pesan_id)->user->tipe == 'admin')
                                                Admin
                                            @else
                                                {{ (new App\Helper\PesanHelper)->getPesan($notif->pesan_id)->user->name }}
                                            @endif
                                        </a></li>
                                    @elseif($notif->comment_id != null)
                                        <li><a href="/iklan/detail/{{ $notif->comment->iklan->kategori_id }}/{{ $notif->comment->iklan->id }}/{{ $notif->id }}">
                                            <span>
                                                <span class="notif-new">baru</span> Komentar di iklan anda
                                            </span></br>
                                            {{ (new App\Helper\CommentHelper)->getComment($notif->comment_id)->iklan->judul }}
                                        </a></li>
                                    @else 
                                        <li><a href="/iklan/detail/{{ $notif->iklan->kategori_id }}/{{ $notif->iklan->id }}/{{ $notif->id }}">
                                            <span>
                                                <span class="notif-new">baru</span> 
                                                @if($notif->like_dislike == 1)
                                                    Anda mendapatkan like </br> pada iklan anda
                                                @else
                                                    Anda mendapatkan dislike </br> pada iklan anda
                                                @endif
                                            </span></br>
                                            {{ (new App\Helper\HomeHelper)->getIklan($notif->iklan_id)->judul }}
                                        </a></li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
            <div id="login-col-id" class="col-lg-1 col-md-1 col-sm-1 login-col">
                @if(!Auth::user())
                <a href="/login" class="btn btn-default btn-lg login-btn">Login</a>
                @else
                    <div class="dropdown" style="display:inline-block;">
                        <button class="btn btn-default btn-lg dropdown-toggle" type="button" id="headerDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="headerDropdown">
                            @if(Auth::user()->isAdmin())
                                <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin Dashboard</a></li>
                            @endif
                            @if(!Auth::user()->isAdmin())
                                <li><a href="/poin"><i class="fa fa-trophy" aria-hidden="true"></i> Poin</a></li>
                                <li><a href="/pesanan"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Pesanan</a></li>
                                <li><a href="/iklan/tambah"><i class="fa fa-plus" aria-hidden="true"></i> Tambah Iklan</a></li>
                            @endif
                            <li><a href="/profile"><i class="fa fa-user"></i> Profil</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div>
                @endif
            </div>
            <div id="register-col-id" class="col-lg-1 col-md-1 col-sm-1 register-col">
            @if(!Auth::user())
                <a href="/register" class="btn btn-default btn-lg register-btn">Register</a>                             
            @endif 
            </div> 
        </div>
    </div>
    <div class="header-kategori-container">
        <div class="container">  
            <div class="row">          
                @foreach((new App\Helper\HomeHelper)->getCategory() as $k => $c)
                    <a href="/iklan/list-by-kategori/{{ $c->id }}">                   
                        <div class="col-lg-2 col-md-2 col-sm-2 header-kategori-list">
                            <li class="kategori-list">{{ $c->nama }}</li>
                        </div> 
                    </a>                
                @endforeach  
            </div> 
        </div>
    </div>   
</header>

    <div class="modal fade keranjang-belanja" tabindex="-1" role="dialog" aria-labelledby="keranjangBelanja">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="model-title">Daftar Belanja</h3>
                </div>
                @if(Auth::user() && count((new App\Helper\HomeHelper)->getBelanja())>0)
                    <div class="modal-body">
                    @foreach((new App\Helper\HomeHelper)->getBelanja() as $b)
                        <div style="margin-bottom: 10px;" class="row row-modal-body">
                            <div class="col-xs-2 modal-foto-iklan">
                                <div class="foto-iklan-picture" style="background-image: url({{ $b->iklan->gambarPertama->foto }})"></div>
                            </div>
                            <div class="col-xs-10 modal-keterangan-iklan">
                                <h4 style="margin-top: 13px;"class="nama-produk">{{ $b->iklan->judul }}</h4>
                                <h4 class="harga-produk modal-harga-produk">Rp. {{ $b->iklan->harga }}</h4>
                            </div>                      
                        </div>                          
                    @endforeach                  
                    </div>
                    <div class="modal-footer">                      
                        <div class="row">
                            <div class="col-xs-6 modal-left-footer">
                                <h4 class="modal-total-belanja">Total Belanja:</h4>         
                            </div>
                            <div class="col-xs-6 modal-right-footer">
                                <h4 class="harga-produk modal-total-harga">Rp. {{ (new App\Helper\HomeHelper)->getHargaAwal('belanja') }}</h4>               
                            </div>
                        </div> 
                        <a style="width: 100%;" href="/belanja/list-belanja" class="btn btn-default btn-lg">Lihat/Ubah Daftar Belanja</a>    
                    </div>
                @else
                    <div class="modal-body">
                        <h4 style="text-align: center;">Belum ada barang yang ditambahkan</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
<section>
    @yield('content');
</section>
<footer>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 footer-left">
            <a href="/tentang"><h4>Tentang tokosebelah.com</h4></a>
            <a href="/panduan/cara-pembelian"><h4>Cara Melakukan Pembelian</h4></a>
            <a href="/panduan/cara-pembayaran"><h4>Cara Melakukan Pembayaran</h4></a>
            <a href="/panduan/cara-pasang-iklan"><h4>Cara Pasang Iklan</h4></a>
            <h3>Copyright 2017</h3>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 footer-right">
            <a href="/" ><img src="{{ asset('img/logo-toko-sebelah-footer.png') }}"></a>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3"></div>
    </div>  
</footer>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/select2.min.js') }}"></script>
<script src="{{ asset('/js/home.js') }}"></script>
<script src="{{ asset('/js/like-dislike.js') }}"></script>
<script src="{{ asset('/js/komen.js') }}"></script>
<script src="{{ asset('/js/voucher.js') }}"></script>
<script src="{{ asset('/js/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/js/auth.js') }}"></script>

</body>
</html>