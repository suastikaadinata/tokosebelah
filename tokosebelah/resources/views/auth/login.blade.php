@extends('auth.layout')

@section('title', 'Login')

@section('content')
    <h1>Login</h1>
        <form rule="form" method="POST" action="{{ route('login') }}">
           {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control input-lg" required autofocus placeholder="E-mail" 
                    name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">  
                <input id="password" type="password" class="form-control input-lg" required placeholder="Password" 
                    name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        
            <div class="form-group">
                <button type="submit" class="btn btn-default btn-lg">
                    Login
                </button>
            </div>
        </form>
    </div>

    <h4>Belum punya akun?<a class="register" href="{{ route('register') }}"> Register</a></h4>
@endsection