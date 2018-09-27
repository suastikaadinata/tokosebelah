@extends('admin.layout')

@section('title', 'List Iklan')

@section('content')
    <h3 style="text-align: center;">List Iklan - Belum Diverifikasi</h3>
    <table style="margin-bottom: 50px;" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Pemilik</th>          
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($iklan as $i)
            @if($i->isVerified == 0)
                <tr>
                    <td class="fit">{{ $i->id }}</td>
                    <td>{{ $i->judul }}</td>
                    <td>Rp. {{ $i->harga }}</td> 
                    <td>{{ $i->user->name }}</td>                 
                    <td class="fit">
                        <a class="btn btn-xs btn-primary" href="/admin/list-iklan/lihat-iklan/{{$i->id}}">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                    </td>                
                </tr>
            @endif              
        @endforeach
        </tbody>
    </table>

    <h3 style="text-align: center;">List Iklan - Sudah Diverifikasi</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Pemilik</th>          
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($iklan as $i)
            @if($i->isVerified == 1)
                <tr>
                    <td class="fit">{{ $i->id }}</td>
                    <td>{{ $i->judul }}</td>
                    <td>Rp. {{ $i->harga }}</td> 
                    <td>{{ $i->user->name }}</td>                 
                    <td class="fit">
                        <a class="btn btn-xs btn-primary" href="/admin/list-iklan/lihat-iklan/{{$i->id}}">
                            <i class="fa fa-eye"></i> Lihat
                        </a>
                    </td>                
                </tr>
            @endif              
        @endforeach
        </tbody>
    </table>
@endsection