@extends('admin.layout')

@section('title', 'Verifikasi Pembayaran')

@section('content')
    <h3 style="text-align: center;">Pembayaran - Belum Diverifikasi</h3>
    <table style="margin-bottom: 50px;" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Total Harga</th>
            <th>Pembeli</th>          
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pembayaran as $p)
            @if($p->isVerified == 0)
                <tr>
                    <td class="fit">{{ $p->id }}</td>
                    <td>Rp. {{ $p->total_harga }}</td> 
                    <td>{{ $p->user->name }}</td>                 
                    <td class="fit">
                        <a class="btn btn-xs btn-primary" href="/admin/verifikasi-pembayaran/detail-pembayaran/{{ $p->id }}">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach             
        </tbody>
    </table>

    <h3 style="text-align: center;">Pembayaran - Sudah Diverifikasi</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Total Harga</th>
            <th>Pembeli</th>          
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pembayaran as $p)
            @if($p->isVerified == 1)
                <tr>
                    <td class="fit">{{ $p->id }}</td>
                    <td>Rp. {{ $p->total_harga }}</td> 
                    <td>{{ $p->user->name }}</td>                 
                    <td class="fit">
                        <a class="btn btn-xs btn-primary" href="/admin/verifikasi-pembayaran/detail-pembayaran/{{ $p->id }}">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endsection