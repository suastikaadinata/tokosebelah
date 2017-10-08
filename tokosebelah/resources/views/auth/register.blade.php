@extends('auth.layout');

@section('title', 'Register User')

@section('content')
    <h1>Register</h1>
        <form rule="form"  method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            
             <div class="form-group form{{ $errors->has('username') ? ' has-error' : '' }}">
                <input id="username" type="text" class="form-control input-lg" required autofocus placeholder="Username" name="username"
                    value="{{ old('username') }}">

                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control input-lg" required autofocus placeholder="E-mail" name="email"
                    value="{{ old('email') }}">
            
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control input-lg" required placeholder="Password" name="password">
            </div>

            <div class="form-group form{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control input-lg" required placeholder="Konfirmasi Password" 
                    name="password_confirmation">
            
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group form{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                <input id="ttl" type="text" class="form-control input-lg" required placeholder="Tanggal Lahir" 
                    name="tanggal_lahir">
        
                @if ($errors->has('tanggal_lahir'))
                    <span class="help-block">
                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-default btn-lg">Register</button>
            </div>
        </form>
    
    <h4>Sudah punya akun?<a class="register" href="{{ route('login') }}"> Login</a></h4>
@endsection