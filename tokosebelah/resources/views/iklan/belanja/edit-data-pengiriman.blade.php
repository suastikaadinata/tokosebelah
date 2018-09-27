@extends('layout')

@section('title', 'Data Pengiriman')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Edit Data Pengiriman</h1>
        <hr>
        <form method="POST" action="/belanja/edit-data-pengiriman/edit/{{ $pengiriman->id }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                <label for="penerima">Penerima Barang</label>
                <input type="text" class="form-control input-lg" id="penerima" name="penerima"
                    placeholder="Penerima Barang" value="{{ $pengiriman->nama }}">
                        
                @if ($errors->has('penerima'))
                    <span class="help-block">
                        <strong>{{ $errors->first('penerima') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('nomor_telepon') ? ' has-error' : '' }}">
                <label for="nomor_telepon">Nomor Telepon</label>
                <input type="text" class="form-control input-lg" id="nomor_telepon" name="nomor_telepon"
                    placeholder="Nomor Telepon" value="{{ $pengiriman->nomor_telepon }}">
                        
                @if ($errors->has('nomor_telepon'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nomor_telepon') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label for="alamat">Alamat Pengiriman</label>
                <input type="text" class="form-control input-lg" id="alamat" name="alamat"
                    placeholder="Alamat Penerima" value="{{ $pengiriman->alamat_pengiriman }}">
                        
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
                Simpan <i class="fa fa-floppy-o" aria-hidden="true"></i>
            </button>
        </form>
    </div>
@endsection