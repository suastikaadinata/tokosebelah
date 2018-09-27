@extends('layout')

@section('title', 'Tambah Iklan')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Tambah Iklan</h1>
        <hr>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <form method="POST" action="/iklan/tambah/save" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                        <label for="judul">Judul Iklan</label>
                        <input type="text" class="form-control input-lg" id="judul" name="judul"
                            placeholder="Judul Iklan" value="{{ old('judul') }}">
                        
                        @if ($errors->has('judul'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                        <label for="kategori">Kategori</label><br/>
                        <select class="form-control input-lg kategori-select" name="kategori">
                        <option selected value="" disabled>Pilih kategori</option>
                            @foreach((new App\Helper\HomeHelper)->getCategory() as $c)
                                <option {{ $c->id == old('kategori') ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->nama }}</option>
                            @endforeach   
                        </select>

                        @if ($errors->has('kategori'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                        <label for="harga">Harga</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon" id="harga-addon">Rp</span>
                            <input id="harga" type="number" name="harga" class="form-control" placeholder="0"
                                aria-describedby="harga-addon" value="{{ old('harga') }}">
                        </div>
                        
                        @if ($errors->has('harga'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                        @endif

                    </div>
                    <label for="judul">Gambar</label><br/>
                    <div class="row">
                        <div class="form-group upload-gambar-form
                        {{ $errors->has('gambar.0')||$errors->has('gambar.1')||$errors->has('gambar.2')
                            ||$errors->has('gambar.3') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                                <label for="upload-gambar-1" class="upload-gambar">
                                    <i class="fa fa-times hidden"></i>
                                    <i class="fa fa-picture-o"></i> <span>Pilih Gambar</span>
                                    <input accept="image/*" class="upload-gambar-input" id="upload-gambar-1" type="file"
                                        name="gambar[]">
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label for="upload-gambar-2" class="upload-gambar">
                                    <i class="fa fa-times hidden"></i>
                                    <i class="fa fa-picture-o"></i> <span>Pilih Gambar</span>
                                    <input accept="image/*" class="upload-gambar-input" id="upload-gambar-2" type="file"
                                        name="gambar[]">
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label for="upload-gambar-3" class="upload-gambar">
                                    <i class="fa fa-times hidden"></i>
                                    <i class="fa fa-picture-o"></i> <span>Pilih Gambar</span>
                                    <input accept="image/*" class="upload-gambar-input" id="upload-gambar-3" type="file"
                                        name="gambar[]">
                                </label>
                            </div>

                            <div class="col-md-3">
                                <label for="upload-gambar-4" class="upload-gambar">
                                    <i class="fa fa-times hidden"></i>
                                    <i class="fa fa-picture-o"></i> <span>Pilih Gambar</span>
                                    <input accept="image/*" class="upload-gambar-input" id="upload-gambar-4" type="file"
                                        name="gambar[]">
                                </label>
                            </div>

                            @if ($errors->has('gambar.0')||$errors->has('gambar.1')||$errors->has('gambar.2')
                            ||$errors->has('gambar.3')||$errors->has('gambar.4'))
                                <span class="help-block" style="padding: 20px;">
                                    <strong>{{ $errors->first('gambar.0') }}</strong>
                                    <strong>{{ $errors->first('gambar.1') }}</strong>
                                    <strong>{{ $errors->first('gambar.2') }}</strong>
                                    <strong>{{ $errors->first('gambar.3') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div style="margin-top: 15px;" class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                        <label for="judul">Deskripsi Iklan</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsikan iklan anda..."
                                rows="8">{{ old('deskripsi') }}</textarea>
                        
                        @if ($errors->has('deskripsi'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                            </span>
                        @endif
                    </div>

                    <label for="features">Fitur Barang</label></br>
                    <div class="row">
                        <div class="form-group{{ $errors->has('features.0')||$errors->has('features.1')||$errors->has('features.2')
                            ||$errors->has('features.3')||$errors->has('features.4')||$errors->has('features.5') ? ' has-error' : '' }}">
                            <div class="col-md-4">                                            
                                <input type="text" class="form-control input-lg" id="features-1" name="features[]"
                                    placeholder="Fitur 1" value="{{ old('features[]') }}">                                 
                            </div>
                            <div class="col-md-4">                                       
                                <input type="text" class="form-control input-lg" id="features-2" name="features[]"
                                    placeholder="Fitur 2" value="{{ old('features[]') }}">                            
                            </div>
                            <div class="col-md-4">          
                                <input type="text" class="form-control input-lg" id="features-3" name="features[]"
                                    placeholder="Fitur 3" value="{{ old('features[]') }}">
                            </div>
                            <div class="col-md-4">          
                                <input type="text" class="form-control input-lg" id="features-4" name="features[]"
                                    placeholder="Fitur 4" value="{{ old('features[]') }}">
                            </div>
                            <div class="col-md-4">                                         
                                <input type="text" class="form-control input-lg" id="features-5" name="features[]"
                                    placeholder="Fitur 5" value="{{ old('features[]') }}">                                
                            </div>
                            <div class="col-md-4">                                   
                                <input type="text" class="form-control input-lg" id="features-6" name="features[]"
                                    placeholder="Fitur 6" value="{{ old('features[]') }}">                               
                            </div>

                            @if ($errors->has('features.0')||$errors->has('features.1')||$errors->has('features.2')
                            ||$errors->has('features.3')||$errors->has('features.4')||$errors->has('features.5'))
                                <span class="help-block" style="padding: 20px;">
                                    <strong>{{ $errors->first('features.0') }}</strong>
                                    <strong>{{ $errors->first('features.1') }}</strong>
                                    <strong>{{ $errors->first('features.2') }}</strong>
                                    <strong>{{ $errors->first('features.3') }}</strong>
                                    <strong>{{ $errors->first('features.4') }}</strong>
                                    <strong>{{ $errors->first('features.5') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <hr>
                    <div class="form-group{{ $errors->has('nomor_telepon') ? ' has-error' : '' }}">
                        <label for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control input-lg" id="nomor_telepon" name="nomor_telepon"
                            placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}">
                        
                        @if ($errors->has('nomor_telepon'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('nomor_telepon') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control input-lg" id="alamat" name="alamat"
                            placeholder="Alamat" value="{{ old('alamat') }}">
                        @if ($errors->has('alamat'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>

                    <input type="hidden" class="kabupaten-json" value="{{ $kabupaten }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('provinsi') ? ' has-error' : '' }}">
                                <label for="judul">Provinsi</label>
                                <select class="form-control input-lg provinsi-select" name="provinsi">
                                    <option selected value="" disabled>Pilih provinsi</option>
                                    @foreach($provinsi as $p)
                                        <option {{ $p->id == old('provinsi') ? 'selected' : '' }} value="{{ $p->id }}">{{ $p->provinsi }}</option>
                                    @endforeach                                    
                                </select>

                                @if ($errors->has('provinsi'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('kabupaten') ? ' has-error' : '' }}">
                                <label for="judul">Kabupaten</label>
                                <select class="form-control input-lg kabupaten-select" name="kabupaten">
                                    <option selected value="" disabled>Pilih provinsi dahulu</option>
                                </select>
                                @if ($errors->has('kabupaten'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kabupaten') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg" style="width: 100%">
                        Tambahkan <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <div class="col-lg-1"></div>
            @if(session()->has('addIklan'))
                <input type="hidden" id="addIklan" value="1">
            @else
                <input type="hidden" id="addIklan" value="0">
            @endif
        </div>
    </div>
    <div id="modal-add-iklan" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 style="text-align: center;" class="modal-title">Pemberitahuan</h3>
                </div>
                <div class="modal-body">
                    <p style="text-align: center; font-size: 1.2em;">Iklan anda berhasil tersimpan dan tunggu sampai diverifikasi oleh admin agar dapat ditampilkan</p>
                </div>
                <div style="text-align: center;" class="modal-footer">        
                    <button style="width: 200px; font-size: 1.3em;" type="button" class="btn btn-primary" data-dismiss="modal">Oke</button>
                </div>
            </div>
        </div>
    </div>
@endsection