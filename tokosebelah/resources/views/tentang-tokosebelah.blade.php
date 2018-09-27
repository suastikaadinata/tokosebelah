@extends('layout')

@section('title', 'Tentang tokosebelah.com')

@section('content')
    <div class="container">
        <h1 style="text-align: center;">Tentang tokosebelah.com</h1>
        <div class="tentang-container">
            <p style="margin-bottom: 25px;">tokosebelah.com merupakan sebuah situs jual-beli barang yang menyediakan berbagai kategori barang dengan berbagai barang yang dijual.
                tokosebelah.com memberikan berbagai keuntungan bagi para member yang membeli barang di tokosebelah.com dengan memberikan potongan harga 10% setiap kali pembeli membeli sejumlah barang dengan total harga 1 juta.
                Member juga akan mendapatkan poin setiap kali melakukan transaksi pembelian yang mana poin tersebut nanti bisa ditukarkan dengan voucher belanja. Member juga dapat memberikan komentar pada iklan yang dipasang oleh member lain maupun iklan member sendiri dan 
                member juga dapat memberikan like atau dislike pada iklan yang dipasang oleh member lain maupun iklan oleh member sendiri.
            </p></br>
            <a href="/panduan/cara-pembelian">
                <h4 style="margin-top: 30px;">
                    Bagaimana cara melakukan pembelian di tokosebelah.com ?
                </h4>
            </a>
            <a href="/panduan/cara-pembayaran">
                <h4>
                    Bagaimana cara melakukan pembayaran di tokosebelah.com ?
                </h4>
            </a>  
            <a href="/panduan/cara-pasang-iklan">
                <h4>
                    Bagaimana cara pasang iklan di tokosebelah.com ?
                </h4>
            </a>         
        </div>
    </div>
@endsection