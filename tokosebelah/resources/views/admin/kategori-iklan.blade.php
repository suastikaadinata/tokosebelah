@extends('admin.layout')

@section('title', 'Kategori Iklan')

@section('title-header', 'Kategori Iklan')

@section('content')
    <div style="margin-top: 20px;" class="row">
        <div class="col-xs-1"></div>
        <div class="col-xs-5">
            <div class="tambah-kategori">
                <h4 style="text-align: center;">Tambah Kategori</h4>
                <hr>
                <form action="/admin/kategori-iklan/tambah-kategori" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('kategori') ? 'has-errors' : '' }}">
                            <input type="text" class="form-control input-lg" id="kategori" name="kategori"
                                placeholder="Masukkan kategori">

                            @if ($errors->has('kategori'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kategori') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button style="width: 100%;" class="btn btn-default btn-lg tambah-kategori-btn"><i class="fa fa-plus" aria-hidden="true"></i> 
                            Tambahkan
                        </button>
                </form>
            </div>
        </div>
        <div class="col-xs-5">
            <div class="hapus-kategori">
                <h4 style="text-align: center;">Hapus Kategori</h4>
                    <hr>
                    <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">                            
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

                    <a style="width: 100%;" id="hapus-kategori-btn" class="btn btn-default btn-lg hapus-kategori-btn"><i class="fa fa-trash" aria-hidden="true"></i>
                        Hapus
                    </a>         
            </div>
        </div>
        <div class="col-xs-1"></div>
    </div>
@endsection