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
    <div class="container">
        <div class="row">
            <div class="col-lg-3 web-logo">
                <a href="/"><img src="{{ asset('img/logo-toko-sebelah.png') }}" ></a>
            </div>
            <div class="search">
                <div class="col-lg-6 col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" name="search" autofocus placeholder="Cari barang yang ingin anda beli">
                        <span class="input-group-btn">
                            <button class="btn btn-default btn-lg submit-btn" type="submit">
                                <i class="fa fa-search search-icon"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 keranjang">
                 <a href=""><img src="{{ asset('img/keranjang.png') }}" ></a>
            </div>
            <div class="col-lg-1 register-col">
                <a href="" class="btn btn-default btn-lg register-btn">Register</a>
            </div>
            <div class="col-lg-1 login-col">
                <a href="" class="btn btn-default btn-lg login-btn">Login</a>
            </div>
        </div>
    </div>
    <div class="header-kategori-container">
        <div class="container">  
            <div class="row">          
                @for($i = 0; $i<6; $i++)
                    <div class="col-lg-2 header-kategori-list">
                        <li class="kategori-list"><a href="">Olahraga dan Hobi</a></li>
                    </div>
                @endfor          
            </div> 
        </div>
    </div>
</header>
<section>
    @yield('content');
</section>
<footer>
    <div class="row">
        <div class="col-lg-6 footer-left">
            <h3>Copyright 2017</h3>
        </div>
        <div class="col-lg-3 footer-right">
            <a href="/" ><img src="{{ asset('img/logo-toko-sebelah-footer.png') }}"></a>
        </div>
        <div class="col-lg-3"></div>
    </div>  
</footer>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/js/auth.js') }}"></script>
<script src="{{ asset('/js/jquery.min.js') }}"></script>

</body>
</html>