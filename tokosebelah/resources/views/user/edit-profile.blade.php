@extends('layout')

@section('title', 'Edit Profile')

@section('content')
    <div class="container">
        <h1 style="text-align:center">Edit Profile</h1>
        <hr>
        <div class="box-edit">
            <div class="edit-profile-container">
                <div class="user-profile-pictures">
                    <div class="picture"
                        style="background-image:url({{ Auth::user()->foto() }});">
                    </div>
                </div>
                <form rule="form"  method="POST" action="/profile/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                    <label class="upload-foto" for="uploadFotoProfil">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                        <input type="file" id="uploadFotoProfil" name="foto">
                        <span class="hidden">imagename</span>
                    </label>

                    <div class="input-edit">   
                        <div class="form-group form{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input id="name" type="text" class="form-control input-lg" required autofocus placeholder="Username" name="name"
                                value="{{ Auth::user()->name }}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group form{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control input-lg" required autofocus placeholder="E-mail" name="email"
                                value="{{ Auth::user()->email }}">
                        
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group form{{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">
                            <input id="ttl" type="text" class="form-control input-lg" required placeholder="Tanggal Lahir" 
                                name="tanggal_lahir" value="{{ str_replace('-', '/', Auth::user()->ttl) }}">
                    
                            @if ($errors->has('tanggal_lahir'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group form{{ $errors->has('biografi') ? ' has-error' : '' }}">
                            <textarea id="biografi" class="form-control input-lg" required placeholder="Biografi Anda" 
                                name="biografi" rows="5">{{ Auth::user()->deskripsi }}</textarea>
                    
                            @if ($errors->has('biografi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('biografi') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-lg simpan-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection