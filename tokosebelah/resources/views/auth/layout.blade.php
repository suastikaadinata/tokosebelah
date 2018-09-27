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
    <link rel="stylesheet" href="{{ asset('/css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}">
</head>
<body>
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-2"></div>
        <div class="col-lg-4 col-md-4 col-sm-8">
            <div class="box">
                <div class="web-logo">
                    <a href="/"><img src="{{ asset('img/logo-toko-sebelah.png') }}"></a>
                </div>
                <hr>
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-2"></div>
    </div>

<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('/js/auth.js') }}"></script>

</body>
</html>